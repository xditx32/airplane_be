<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'thumnail',
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

    public function product_photos():HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }

    public function product_benefits():HasMany
    {
        return $this->hasMany(ProductBenefit::class);
    }

    public function product_airplanes():HasMany
    {
        return $this->hasMany(ProductAirplane::class, 'product_id');
    }
}
