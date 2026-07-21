<?php
$file = 'resources/views/website/index.blade.php';
$html = file_get_contents($file);

$html = preg_replace('/(<section class="services-area.*?<\/section>)/is', "$1\n@endif", $html, 1);
$html = preg_replace('/(<section class="project-area.*?<\/section>)/is', "$1\n@endif", $html, 1);
$html = preg_replace('/(<section class="blog-area.*?<\/section>)/is', "$1\n@endif", $html, 1);

file_put_contents($file, $html);
echo "Fixed @endif tags.\n";
