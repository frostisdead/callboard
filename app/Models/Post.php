<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['id', 'post_content', 'post_topic', 'post_by	', 'subcategory_id', 'created_at','updated_at', 'slug'];
    // use HasFactory;
}
