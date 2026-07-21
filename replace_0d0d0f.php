<?php
$dir = new RecursiveDirectoryIterator('public/assets/css');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite, '/^.+\.css$/i', RecursiveRegexIterator::GET_MATCH);

$replacements = [
    '/(?<![A-Za-z0-9])#0D0D0F(?![A-Za-z0-9])/i' => '#555555',
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
echo 'Replaced #0D0D0F in ' . $count . ' CSS files.';
