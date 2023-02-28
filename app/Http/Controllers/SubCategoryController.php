<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
    public function show_subcats ($slug) {
        $cat_name = Category::where('slug', '=', $slug)->get('category_name');
        $subcategories = SubCategory::get();
        return view('callboard.subcategories', compact('cat_name','subcategories'));
    }
    public function show_subcat ($slug) {
        $subcat_name = SubCategory::where('slug', '=', $slug)->get('subcategory_name');
        $posts = Post::get();
        return view('callboard.subcategory', compact('subcat_name', 'posts'));
    }
    public function create_subcategory () {
        $categories = Category::all(['id','category_name']);
        return view('callboard.crsubcategory', compact('categories'));
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $sub_cat = new SubCategory();
        $sub_cat->subcategory_name = $data['subcategory_name'];
        $sub_cat->description = $data['description'];
        $sub_cat->category_id = $data['category'];
        $sub_cat->slug = Str::slug($sub_cat->subcategory_name);
        $sub_cat->save();
        return redirect('dashboard');
    }
}
