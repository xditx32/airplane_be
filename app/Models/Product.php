<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'thumbnail',
        'is_open',
        'price',
        'duration',
        'about',
        'category_id',
        'priode_id',
        'slug',
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function priode():BelongsTo
    {
        return $this->belongsTo(Priode::class, 'priode_id');
    }

    public function ProductPhotos():HasMany
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function ProductBenefits():HasMany
    {
        return $this->hasMany(ProductBenefit::class, 'product_id');
    }

    public function ProductHotels():HasMany
    {
        return $this->hasMany(ProductHotel::class, 'product_id');
    }

    public function ProductAirlines():HasMany
    {
        return $this->hasMany(ProductAirline::class, 'product_id');
    }
}
