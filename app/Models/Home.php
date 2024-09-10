<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'gmap_link'
    ];

    public function HomeSlider():HasMany
    {
        return $this->hasMany(HomeSlider::class, 'home_id');
    }
}
