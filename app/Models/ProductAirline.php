<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAirline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'airline_id',
        'product_id',
    ];

    public function airline():BelongsTo
    {
        return $this->belongsTo(Airline::class, 'airline_id');
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
