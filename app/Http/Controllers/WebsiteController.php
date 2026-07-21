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
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        $projects = Project::latest()->take(6)->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('website.index', compact('services', 'projects', 'blogs'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('website.projects', compact('projects'));
    }

    public function projectDetails($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('website.project_details', compact('project'));
    }

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('website.blogs', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('website.blog_details', compact('blog'));
    }

    public function pricing()
    {
        $packages = Package::with('prices.country')->get();
        return view('website.pricing', compact('packages'));
    }

    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
        return view('website.page', compact('page'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function submitContact(ContactFormRequest $request)
    {
        $data = $request->validated();

        ContactRequest::create($data);

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
