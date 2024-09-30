<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'sub_title',
        'detail',
        'photo',
        'button_title',
        'button_link',
        'category_slider_id',
        'is_active',
    ];

    public function CategorySlider():BelongsTo
    {
        return $this->belongsTo(CategorySlider::class, 'category_slider_id');
    }
}
