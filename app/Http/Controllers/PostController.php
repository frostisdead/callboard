<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Session;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public $title;
    public $creator_name;
    public $text;
    public $desc;

    public function create_post()
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('callboard.crpost', compact('subcategories', 'categories'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $post = new Post();
        $post->post_topic = $data['post_topic'];
        $post->post_content = $data['post_content'];
        $post->post_by = auth()->user()->name;
        $post->subcategory_id = $data['subcategory'];
        $post->slug = Str::slug($post->post_topic);
        $post->save();
        return redirect('dashboard');
    }

public function show_post ($slug) {
    $post = Post::where('slug', '=', $slug)->get();
    return view('callboard.post', compact('post'));
}

    public function delete($id)
    {
        Post::where('id', $id)->firstorfail()->delete();
        return redirect('/categories');
    }

}