<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'photo',
        'button_title',
        'button_link',
        'is_active',
        'home_id'
    ];

    public function Home():BelongsTo
    {
        return $this->belongsTo(Home::class, 'home_id');
    }
}
