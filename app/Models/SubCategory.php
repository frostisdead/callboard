<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['id', 'subcategory_name', 'category_id', 'description', 'created_at','updated_at', 'slug'];
    // use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
