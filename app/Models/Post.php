<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'categories_id',
        'is_headline',
        'status',
        'content',
    ];

    public static $rules = [
        'title'         => 'required',
        'banner'        => 'required',
        'categories_id' => 'required',
        'is_headline'   => 'required',
        'status'        => 'required',
        'content'       => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categories_id');
    }
}
