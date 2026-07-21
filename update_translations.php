<?php

$keys_en = [
    'home_blog_texts_ar' => 'Home Blog Texts (AR)',
    'home_blog_title' => 'Blog Title',
    'home_blog_subtitle' => 'Blog Subtitle',
    'home_blog_text' => 'Blog Text',
    'home_services_texts_ar' => 'Home Services Texts (AR)',
    'home_services_title' => 'Services Title',
    'home_services_subtitle' => 'Services Subtitle',
    'home_services_text' => 'Services Text',
    'home_projects_texts_ar' => 'Home Projects Texts (AR)',
    'home_projects_title' => 'Projects Title',
    'home_projects_subtitle' => 'Projects Subtitle',
    'home_projects_text' => 'Projects Text',
    
    'home_blog_texts_en' => 'Home Blog Texts (EN)',
    'home_services_texts_en' => 'Home Services Texts (EN)',
    'home_projects_texts_en' => 'Home Projects Texts (EN)',

    'homepage_sections_visibility' => 'Homepage Sections Visibility',
    'toggle_sections_desc' => 'Toggle sections on the homepage.',
    'show_services_section' => 'Show Services Section',
    'show_projects_section' => 'Show Projects Section',
    'show_blogs_section' => 'Show Blogs Section',

    'navigation_menus' => 'Navigation Menus',
    'manage_nav_desc' => 'Manage Header and Footer links.',
    'header_links' => 'Header Links',
    'add_to_header' => 'Add to header links',
    'label_ar' => 'Label (Arabic)',
    'label_en' => 'Label (English)',
    'url_label' => 'URL (e.g. /projects or https://...)',
    'is_dropdown' => 'Is Dropdown?',
    'dropdown_links' => 'Dropdown Links',
    'add_sub_link' => 'Add sub link',
    'url_simple' => 'URL',

    'footer_links' => 'Footer Links',
    'add_to_footer' => 'Add to footer links',
];

$keys_ar = [
    'home_blog_texts_ar' => 'نصوص قسم المقالات (عربي)',
    'home_blog_title' => 'عنوان القسم',
    'home_blog_subtitle' => 'العنوان الفرعي للقسم',
    'home_blog_text' => 'نص القسم',
    'home_services_texts_ar' => 'نصوص قسم الخدمات (عربي)',
    'home_services_title' => 'عنوان القسم',
    'home_services_subtitle' => 'العنوان الفرعي للقسم',
    'home_services_text' => 'نص القسم',
    'home_projects_texts_ar' => 'نصوص قسم المشاريع (عربي)',
    'home_projects_title' => 'عنوان القسم',
    'home_projects_subtitle' => 'العنوان الفرعي للقسم',
    'home_projects_text' => 'نص القسم',
    
    'home_blog_texts_en' => 'نصوص قسم المقالات (إنجليزي)',
    'home_services_texts_en' => 'نصوص قسم الخدمات (إنجليزي)',
    'home_projects_texts_en' => 'نصوص قسم المشاريع (إنجليزي)',

    'homepage_sections_visibility' => 'ظهور أقسام الصفحة الرئيسية',
    'toggle_sections_desc' => 'تفعيل أو تعطيل الأقسام في الصفحة الرئيسية.',
    'show_services_section' => 'إظهار قسم الخدمات',
    'show_projects_section' => 'إظهار قسم المشاريع',
    'show_blogs_section' => 'إظهار قسم المقالات',

    'navigation_menus' => 'قوائم التنقل (الروابط)',
    'manage_nav_desc' => 'إدارة روابط الهيدر والفوتر.',
    'header_links' => 'روابط الهيدر',
    'add_to_header' => 'إضافة إلى روابط الهيدر',
    'label_ar' => 'الاسم (بالعربية)',
    'label_en' => 'الاسم (بالإنجليزية)',
    'url_label' => 'الرابط (مثال: /projects أو https://...)',
    'is_dropdown' => 'هل يحتوي على قائمة منسدلة؟',
    'dropdown_links' => 'الروابط المنسدلة الفرعية',
    'add_sub_link' => 'إضافة رابط فرعي',
    'url_simple' => 'الرابط',

    'footer_links' => 'روابط الفوتر',
    'add_to_footer' => 'إضافة إلى روابط الفوتر',
];

function appendTranslations($file, $newKeys) {
    $content = file_get_contents($file);
    $appendStr = "";
    foreach($newKeys as $k => $v) {
        $appendStr .= "    '$k' => '" . addslashes($v) . "',\n";
    }
    // append right before the last closing bracket "];"
    $content = preg_replace('/\]\s*;\s*$/', "\n" . $appendStr . "];\n", $content);
    file_put_contents($file, $content);
}

appendTranslations('lang/en/dashboard.php', $keys_en);
appendTranslations('lang/ar/dashboard.php', $keys_ar);

// Now update GeneralSettings.php
$gs = file_get_contents('app/Filament/Pages/GeneralSettings.php');

$replacements = [
    "'Home Blog Texts (AR)'" => "__('dashboard.home_blog_texts_ar')",
    "'Blog Title'" => "__('dashboard.home_blog_title')",
    "'Blog Subtitle'" => "__('dashboard.home_blog_subtitle')",
    "'Blog Text'" => "__('dashboard.home_blog_text')",
    "'Home Services Texts (AR)'" => "__('dashboard.home_services_texts_ar')",
    "'Services Title'" => "__('dashboard.home_services_title')",
    "'Services Subtitle'" => "__('dashboard.home_services_subtitle')",
    "'Services Text'" => "__('dashboard.home_services_text')",
    "'Home Projects Texts (AR)'" => "__('dashboard.home_projects_texts_ar')",
    "'Projects Title'" => "__('dashboard.home_projects_title')",
    "'Projects Subtitle'" => "__('dashboard.home_projects_subtitle')",
    "'Projects Text'" => "__('dashboard.home_projects_text')",

    "'Home Blog Texts (EN)'" => "__('dashboard.home_blog_texts_en')",
    "'Home Services Texts (EN)'" => "__('dashboard.home_services_texts_en')",
    "'Home Projects Texts (EN)'" => "__('dashboard.home_projects_texts_en')",

    "'ظهور أقسام الصفحة الرئيسية'" => "__('dashboard.homepage_sections_visibility')",
    "'تفعيل أو تعطيل الأقسام في الصفحة الرئيسية.'" => "__('dashboard.toggle_sections_desc')",
    "'إظهار قسم الخدمات'" => "__('dashboard.show_services_section')",
    "'إظهار قسم المشاريع'" => "__('dashboard.show_projects_section')",
    "'إظهار قسم المقالات'" => "__('dashboard.show_blogs_section')",

    "'قوائم التنقل (الروابط)'" => "__('dashboard.navigation_menus')",
    "'إدارة روابط الهيدر والفوتر.'" => "__('dashboard.manage_nav_desc')",
    "'روابط الهيدر'" => "__('dashboard.header_links')",
    "'إضافة إلى روابط الهيدر'" => "__('dashboard.add_to_header')",
    "'الاسم (بالعربية)'" => "__('dashboard.label_ar')",
    "'الاسم (بالإنجليزية)'" => "__('dashboard.label_en')",
    "'الرابط (مثال: /projects أو https://...)'" => "__('dashboard.url_label')",
    "'هل يحتوي على قائمة منسدلة؟'" => "__('dashboard.is_dropdown')",
    "'الروابط المنسدلة الفرعية'" => "__('dashboard.dropdown_links')",
    "'إضافة رابط فرعي'" => "__('dashboard.add_sub_link')",
    "'الرابط'" => "__('dashboard.url_simple')",

    "'روابط الفوتر'" => "__('dashboard.footer_links')",
    "'إضافة إلى روابط الفوتر'" => "__('dashboard.add_to_footer')",
];

$gs = str_replace(array_keys($replacements), array_values($replacements), $gs);
file_put_contents('app/Filament/Pages/GeneralSettings.php', $gs);

echo "Translations applied.\n";
