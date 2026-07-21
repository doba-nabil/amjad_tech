<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
Illuminate\Support\Facades\Schema::table('settings', function ($table) {
    $table->json('footer_text')->nullable();
});
echo "footer_text column added.\n";
