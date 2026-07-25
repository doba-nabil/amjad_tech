<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = [
        'name'
    ];

    public function packagePrices()
    {
        return $this->hasMany(PackagePrice::class);
    }
}
