<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'sub_title',
        'desciption',
        'photo_desktop',
        'photo_mobile',
        'button_title',
        'button_link',
        'is_active'
    ];
}
