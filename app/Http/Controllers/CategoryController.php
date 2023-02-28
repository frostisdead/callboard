<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function show_cats () {
        $categories = Category::all();
        return view('callboard.categories', compact('categories'));
    }
    public function create_category()
    {
        return view('callboard.crcategory');
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $cat = new Category();
        $cat->category_name = $data['category_name'];
        $cat->description = $data['description'];
        $cat->slug = Str::slug($cat->category_name);
        $cat->save();
        return redirect('dashboard');
    }
}