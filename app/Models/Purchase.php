<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    protected $casts = [
        'purchase_date' => 'date',
        'expiration_date' => 'date',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
