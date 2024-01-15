<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image',
    ];

    public static $rules = [
        'category_id' => 'required',
        'image' => 'required'
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class, 'categories_id', 'id');
    }
}