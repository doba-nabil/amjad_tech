<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Package;
use App\Models\Page;
use App\Models\ContactRequest;
use App\Models\Setting;
use App\Http\Requests\ContactFormRequest;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Subscriber;
use App\Models\Category;

class WebsiteController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        $projects = Project::latest()->take(6)->get();
        $blogs = Blog::latest()->take(3)->get();
        
        $monthlyPackages = Package::where('type', 'monthly')->with('prices.country')->get();
        $yearlyPackages = Package::where('type', 'yearly')->with('prices.country')->get();
        $pricingCountries = \App\Models\Country::whereHas('packagePrices')->get();

        $features = Feature::latest()->take(4)->get();
        $partners = Partner::latest()->get();
        $projectCategories = Category::whereIn('type', ['project', 'both'])->get();
        $selectedCountryId = $pricingCountries->first()->id ?? null;
        
        return view('website.index', compact('services', 'projects', 'blogs', 'monthlyPackages', 'yearlyPackages', 'pricingCountries', 'features', 'partners', 'projectCategories', 'selectedCountryId'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        Subscriber::create([
            'email' => $request->email
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => __('dashboard.subscribed_successfully') ?? 'You have successfully subscribed to our newsletter!']);
        }

        return back()->with('success', __('dashboard.subscribed_successfully') ?? 'You have successfully subscribed to our newsletter!');
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        $projectCategories = Category::whereIn('type', ['project', 'both'])->get();
        return view('website.projects', compact('projects', 'projectCategories'));
    }

    public function projectDetails($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('website.project_details', compact('project'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::query();
        if ($request->has('search') && $request->search != '') {
            $searchTerm = strtolower($request->search);
            $blogs->where(function ($q) use ($searchTerm) {
                $q->whereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(main_title, "$.en"))) LIKE ?', ['%' . $searchTerm . '%'])
                  ->orWhereRaw('LOWER(JSON_UNQUOTE(JSON_EXTRACT(main_title, "$.ar"))) LIKE ?', ['%' . $searchTerm . '%']);
            });
        }
        
        $tagModel = null;
        if ($request->has('tag') && $request->tag != '') {
            $tagModel = \App\Models\Tag::where('slug', $request->tag)->first();
            $blogs->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }
        $blogs = $blogs->latest()->paginate(9);
        $blogCategories = Category::whereIn('type', ['blog', 'both'])->get();
        $recentBlogs = Blog::latest()->take(3)->get();
        return view('website.blogs', compact('blogs', 'blogCategories', 'recentBlogs', 'tagModel'));
    }

    public function categoryBlogs($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('category_id', $category->id)->latest()->paginate(9);
        $blogCategories = Category::whereIn('type', ['blog', 'both'])->get();
        $recentBlogs = Blog::latest()->take(3)->get();
        return view('website.blogs', compact('blogs', 'category', 'blogCategories', 'recentBlogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blogCategories = Category::whereIn('type', ['blog', 'both'])->get();
        $recentBlogs = Blog::latest()->take(3)->get();
        return view('website.blog_details', compact('blog', 'blogCategories', 'recentBlogs'));
    }

    public function postComment(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        $blog->comments()->create($request->only('name', 'email', 'message'));
        
        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Comment added successfully!']);
        }
        
        return back()->with('success', 'Comment added successfully!');
    }

    public function pricing()
    {
        $monthlyPackages = Package::where('type', 'monthly')->with('prices.country')->get();
        $yearlyPackages = Package::where('type', 'yearly')->with('prices.country')->get();
        $pricingCountries = \App\Models\Country::whereHas('packagePrices')->get();
        $settings = \App\Models\Setting::first();
        $selectedCountryId = $pricingCountries->first()->id ?? null;
        
        return view('website.pricing', compact('monthlyPackages', 'yearlyPackages', 'pricingCountries', 'settings', 'selectedCountryId'));
    }

    public function renderPackages(Request $request)
    {
        $countryId = $request->country_id;
        
        $monthlyPackages = Package::where('type', 'monthly')
            ->whereHas('prices', function($q) use ($countryId) {
                $q->where('country_id', $countryId);
            })
            ->with(['prices' => function($q) use ($countryId) {
                $q->where('country_id', $countryId);
            }])
            ->get();

        $yearlyPackages = Package::where('type', 'yearly')
            ->whereHas('prices', function($q) use ($countryId) {
                $q->where('country_id', $countryId);
            })
            ->with(['prices' => function($q) use ($countryId) {
                $q->where('country_id', $countryId);
            }])
            ->get();
            
        $selectedCountryId = $countryId;

        return view('website.partials.packages', compact('monthlyPackages', 'yearlyPackages', 'selectedCountryId'))->render();
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function contactSubmit(ContactFormRequest $request)
    {
        $contactRequest = ContactRequest::create($request->validated());
        
        try {
            \Illuminate\Support\Facades\Mail::to($contactRequest->email)->send(new \App\Mail\ContactAutoReplyMail($contactRequest));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact auto-reply: ' . $e->getMessage());
        }
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => __('dashboard.sent_successfully') ?? 'Your message has been sent successfully!']);
        }
        
        return back()->with('success', __('dashboard.sent_successfully') ?? 'Your message has been sent successfully!');
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::where('is_active', true)->get();
        return view('website.faq', compact('faqs'));
    }

    public function mySubscriptions()
    {
        return view('website.my_subscriptions');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = trim($request->email);
        $otp = rand(100000, 999999);

        // Store OTP in Cache for 10 minutes
        \Illuminate\Support\Facades\Cache::put('otp_' . $email, $otp, now()->addMinutes(10));

        // Send OTP email
        try {
            \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\OtpMail($otp));
        } catch (\Exception $e) {
            \Log::error('Failed to send OTP email: ' . $e->getMessage());
            return back()->with('error', __('dashboard.failed_to_send_otp') ?? 'Failed to send OTP email.')->withInput();
        }

        session(['otp_email' => $email]);
        return redirect()->route('my.subscriptions')->with('show_otp_form', true);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $email = trim($request->email);
        $otp = trim($request->otp);

        $cachedOtp = \Illuminate\Support\Facades\Cache::get('otp_' . $email);

        if ($cachedOtp && $cachedOtp == $otp) {
            // OTP is valid
            \Illuminate\Support\Facades\Cache::forget('otp_' . $email);
            session(['verified_email' => $email]);
            return redirect()->route('my.subscriptions.track');
        }

        return redirect()->route('my.subscriptions')->with('show_otp_form', true)->with('error', __('dashboard.invalid_otp') ?? 'Invalid or expired OTP.');
    }

    public function trackSubscriptions(Request $request)
    {
        $verifiedEmail = session('verified_email');

        if (!$verifiedEmail) {
            return redirect()->route('my.subscriptions');
        }

        $purchases = \App\Models\Purchase::with('package')
            ->where('email', $verifiedEmail)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('website.my_subscriptions', [
            'purchases' => $purchases,
            'identifier' => $verifiedEmail,
        ]);
    }
}
