<?php
$file = 'resources/views/website/index.blade.php';
$html = file_get_contents($file);

$html = str_replace('<section class="services-area sec-mar">', "@if(\$settings->show_services_section && \$services->isNotEmpty())\n<section class=\"services-area sec-mar\">", $html);
$html = preg_replace('/(<\/section>\s*<!-- Start about-area section -->)/', "@endif\n$1", $html);

$html = str_replace('<section class="project-area sec-mar">', "@if(\$settings->show_projects_section && \$projects->isNotEmpty())\n<section class=\"project-area sec-mar\">", $html);
$html = preg_replace('/(<\/section>\s*<!-- Start our-partner section -->)/', "@endif\n$1", $html);

$html = str_replace('<section class="blog-area">', "@if(\$settings->show_blogs_section && \$blogs->isNotEmpty())\n<section class=\"blog-area\">", $html);
$html = preg_replace('/(<\/section>\s*<!-- Start subscribe-newsletter section -->)/', "@endif\n$1", $html);

file_put_contents($file, $html);
echo "Updated index.blade.php";
