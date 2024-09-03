<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAirplane extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'airplane_id',
        'product_id',
    ];

    public function airplane():BelongsTo
    {
        return $this->belongsTo(airplane_id::class, 'airplane_id');
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(product_id::class, 'product_id');
    }


}
