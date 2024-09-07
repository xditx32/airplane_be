<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Priode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'slug',
    ];

    public function setNameAttribute($value) {
         $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }

}
