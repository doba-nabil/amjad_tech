<?php
$src = 'vendor/mcamara/laravel-localization/src/config/config.php';
$dest = 'config/laravellocalization.php';

$content = file_get_contents($src);

// Replace from 'supportedLocales' => [ until the closing ],
$startToken = "'supportedLocales' => [";
$startPos = strpos($content, $startToken);

// Find the first line after $startPos that is exactly "    ],"
$endToken = "    ],";
$endPos = strpos($content, $endToken, $startPos);

if ($startPos !== false && $endPos !== false) {
    $before = substr($content, 0, $startPos);
    $after = substr($content, $endPos + strlen($endToken));
    
    $newSupportedLocales = "'supportedLocales' => [
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
        'ar' => ['name' => 'Arabic', 'script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE'],
    ],";
    
    $content = $before . $newSupportedLocales . $after;
    file_put_contents($dest, $content);
    echo "Config fixed successfully.";
} else {
    echo "Failed to find boundaries.";
}
