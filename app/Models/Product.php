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
        'title',
        'photo',
        'description',
        'brochure',
        'is_open',
        'is_promo',
        'display',
        'is_currency',
        'price_start_from',
        'duration',
        'detail',
        'seat_available',
        'category_id',
        'start_priode',
        'end_priode',
        'slug',
    ];

    protected $casts = [
        'start_priode' => 'datetime',
        'end_priode' => 'datetime',
    ];

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ProductPhotos():HasMany
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    public function ProductBenefits():HasMany
    {
        return $this->hasMany(ProductBenefit::class, 'product_id');
    }

    public function ProductTags():HasMany
    {
        return $this->hasMany(ProductTag::class, 'product_id');
    }

    public function ProductPrices():HasMany
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }

    public function ProductHoteles():HasMany
    {
        return $this->hasMany(ProductHotel::class, 'product_id');
    }

    public function ProductAirlines():HasMany
    {
        return $this->hasMany(ProductAirline::class, 'product_id');
    }
}
