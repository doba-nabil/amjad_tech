<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Service;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Partner;
use App\Models\Country;
use App\Models\Package;
use App\Models\PackagePrice;

class DemoContentSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        
        // Copy some dummy images to storage
        if (!Storage::disk('public')->exists('demo')) {
            Storage::disk('public')->makeDirectory('demo');
        }

        $sourceDir = public_path('assets/img');
        $destDir = storage_path('app/public/demo');

        // Helper to copy a file and return the storage path
        $copyImage = function($relativePath) use ($sourceDir, $destDir) {
            $source = $sourceDir . '/' . $relativePath;
            $filename = basename($relativePath);
            if (File::exists($source)) {
                File::copy($source, $destDir . '/' . $filename);
                return 'demo/' . $filename;
            }
            return null;
        };

        // 1. Categories
        $catBlog1 = Category::firstOrCreate(['slug' => 'tech-news'], [
            'name' => ['en' => 'Tech News', 'ar' => 'أخبار التقنية'],
            'type' => 'blog'
        ]);
        $catBlog2 = Category::firstOrCreate(['slug' => 'tutorials'], [
            'name' => ['en' => 'Tutorials', 'ar' => 'شروحات'],
            'type' => 'blog'
        ]);
        $catProject1 = Category::firstOrCreate(['slug' => 'web-development'], [
            'name' => ['en' => 'Web Development', 'ar' => 'تطوير الويب'],
            'type' => 'project'
        ]);
        $catProject2 = Category::firstOrCreate(['slug' => 'mobile-apps'], [
            'name' => ['en' => 'Mobile Apps', 'ar' => 'تطبيقات الجوال'],
            'type' => 'project'
        ]);

        // 2. Services
        $services = [
            ['title' => ['en' => 'Web Design', 'ar' => 'تصميم مواقع'], 'desc' => 'We create beautiful and responsive websites.', 'icon' => 'icons/service-icon-1.png'],
            ['title' => ['en' => 'App Development', 'ar' => 'تطوير تطبيقات'], 'desc' => 'High-quality mobile apps for iOS and Android.', 'icon' => 'icons/service-icon-2.png'],
            ['title' => ['en' => 'SEO Optimization', 'ar' => 'تحسين محركات البحث'], 'desc' => 'Rank higher on Google and get more traffic.', 'icon' => 'icons/service-icon-3.png'],
            ['title' => ['en' => 'Digital Marketing', 'ar' => 'تسويق رقمي'], 'desc' => 'Grow your audience and increase sales.', 'icon' => 'icons/service-icon-4.png'],
            ['title' => ['en' => 'Cloud Solutions', 'ar' => 'حلول سحابية'], 'desc' => 'Secure and scalable cloud infrastructure.', 'icon' => 'icons/service-icon-5.png'],
            ['title' => ['en' => 'Cyber Security', 'ar' => 'أمن سيبراني'], 'desc' => 'Protect your business from cyber threats.', 'icon' => 'icons/service-icon-6.png']
        ];
        foreach ($services as $s) {
            Service::firstOrCreate(['title->en' => $s['title']['en']], [
                'title' => $s['title'],
                'description' => ['en' => $s['desc'], 'ar' => $s['desc']],
                'image' => $copyImage($s['icon'])
            ]);
        }

        // 3. Projects
        for ($i = 1; $i <= 6; $i++) {
            Project::firstOrCreate(['slug' => 'project-' . $i], [
                'name' => ['en' => 'Project ' . $i, 'ar' => 'مشروع ' . $i],
                'description' => ['en' => $faker->paragraph(3), 'ar' => $faker->paragraph(3)],
                'main_image' => $copyImage('project/project-' . $i . '.jpg'),
                'project_banner' => $copyImage('project/project-' . $i . '.jpg'),
                'company_banner' => $copyImage('project/project-' . $i . '.jpg'),
                'client_banner' => $copyImage('project/project-' . $i . '.jpg'),
                'category_id' => $i % 2 == 0 ? $catProject1->id : $catProject2->id,
            ]);
        }

        // 4. Blogs
        for ($i = 1; $i <= 6; $i++) {
            Blog::firstOrCreate(['slug' => 'blog-' . $i], [
                'main_title' => ['en' => $faker->sentence(6), 'ar' => 'مقال تجريبي ' . $i],
                'content' => ['en' => $faker->paragraph(4), 'ar' => $faker->paragraph(4)],
                'image' => $copyImage('blog/blog-' . rand(1,3) . '.jpg'),
                'category_id' => $i % 2 == 0 ? $catBlog1->id : $catBlog2->id,
                'author_name' => $faker->name,
                'published_at' => now()->subDays(rand(1, 30))
            ]);
        }

        // 5. Features
        $features = [
            ['title' => ['en' => 'Fast Performance', 'ar' => 'أداء سريع'], 'desc' => 'Lightning fast load times.', 'icon' => 'icons/feature-icon-1.png'],
            ['title' => ['en' => 'Secure', 'ar' => 'آمن'], 'desc' => 'Top-notch security measures.', 'icon' => 'icons/feature-icon-2.png'],
            ['title' => ['en' => '24/7 Support', 'ar' => 'دعم فني'], 'desc' => 'We are always here to help.', 'icon' => 'icons/feature-icon-3.png'],
            ['title' => ['en' => 'Scalable', 'ar' => 'قابل للتوسع'], 'desc' => 'Grows with your business.', 'icon' => 'icons/feature-icon-4.png']
        ];
        foreach ($features as $f) {
            Feature::firstOrCreate(['title->en' => $f['title']['en']], [
                'title' => $f['title'],
                'description' => ['en' => $f['desc'], 'ar' => $f['desc']],
                'image' => $copyImage($f['icon'])
            ]);
        }

        // 6. Partners
        for ($i = 1; $i <= 6; $i++) {
            Partner::firstOrCreate(['name' => 'Partner ' . $i], [
                'name' => 'Partner ' . $i,
                'image' => $copyImage('partner/partner-' . $i . '.png')
            ]);
        }

        // 7. Countries and Packages
        $country1 = Country::firstOrCreate(['name->en' => 'USA'], ['name' => ['en' => 'USA', 'ar' => 'أمريكا'], 'currency_code' => 'USD']);
        $country2 = Country::firstOrCreate(['name->en' => 'Saudi Arabia'], ['name' => ['en' => 'Saudi Arabia', 'ar' => 'السعودية'], 'currency_code' => 'SAR']);

        $packages = [
            ['name' => ['en' => 'Basic', 'ar' => 'أساسي'], 'sub_name' => ['en' => 'For Individuals', 'ar' => 'للأفراد']],
            ['name' => ['en' => 'Pro', 'ar' => 'احترافي'], 'sub_name' => ['en' => 'For Startups', 'ar' => 'للشركات الناشئة']],
            ['name' => ['en' => 'Enterprise', 'ar' => 'مؤسسي'], 'sub_name' => ['en' => 'For Large Teams', 'ar' => 'للشركات الكبيرة']]
        ];

        $price = 10;
        foreach ($packages as $p) {
            $pack = Package::firstOrCreate(['name->en' => $p['name']['en']], [
                'name' => $p['name'],
                'sub_name' => $p['sub_name'],
                'features' => ['en' => ['Feature 1', 'Feature 2', 'Feature 3'], 'ar' => ['ميزة 1', 'ميزة 2', 'ميزة 3']],
                'type' => 'monthly'
            ]);

            PackagePrice::firstOrCreate(['package_id' => $pack->id, 'country_id' => $country1->id], [
                'price' => $price * 10
            ]);
            PackagePrice::firstOrCreate(['package_id' => $pack->id, 'country_id' => $country2->id], [
                'price' => $price * 40
            ]);
            $price += 20;
        }

        echo "Demo Content Seeded Successfully!\n";
    }
}
