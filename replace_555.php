<?php
$dir = new RecursiveDirectoryIterator('public/assets/css');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.css$/i', RecursiveRegexIterator::GET_MATCH);

$replacements = [
    '/(?<![A-Za-z0-9])#555555(?![A-Za-z0-9])/i' => '#5555557d',
];

$count = 0;
foreach($files as $file) {
    $path = $file[0];
    $content = file_get_contents($path);
    $newContent = preg_replace(array_keys($replacements), array_values($replacements), $content);
    if($content !== $newContent) {
        file_put_contents($path, $newContent);
        $count++;
    }
}
echo 'Replaced #555555 with #5555557d in ' . $count . ' CSS files.';
