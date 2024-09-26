<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPrice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'price_type',
        'price_tier',
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
