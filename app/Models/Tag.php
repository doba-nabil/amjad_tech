<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasTranslations;

    protected $guarded = [];

    public $translatable = [
        'name'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
