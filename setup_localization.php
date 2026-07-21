<?php
$src = 'vendor/mcamara/laravel-localization/src/config/config.php';
$dest = 'config/laravellocalization.php';

if (file_exists($src)) {
    $config = file_get_contents($src);
    // Replace the default supportedLocales array with just ar and en
    $replacement = "'supportedLocales' => [
        'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
        'ar' => ['name' => 'Arabic', 'script' => 'Arab', 'native' => 'العربية', 'regional' => 'ar_AE'],
    ]";
    $config = preg_replace('/\'supportedLocales\'\s*=>\s*\[.*?\]/is', $replacement, $config, 1);
    
    // Also change useAcceptLanguageHeader to true, usually a good idea
    $config = str_replace("'useAcceptLanguageHeader' => true", "'useAcceptLanguageHeader' => false", $config);

    file_put_contents($dest, $config);
    echo "Config copied and modified.\n";
} else {
    echo "Source config not found.\n";
}
