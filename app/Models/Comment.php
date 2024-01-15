<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'email',
        'comment',
        'posts_id'
    ];

    public static $rules = [
        'name'      => 'required',
        'subject'   => 'required',
        'email'     => 'required',
        'comment'   => 'required',
        'posts_id'  => 'required'
    ];
}
