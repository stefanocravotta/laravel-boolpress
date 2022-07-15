<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        //$posts = Post::orderBy('id')->paginate(10);
        $posts = Post::with(['category','tags'])->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();

        return response()->json(compact('posts','categories','tags'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category','tags'])->first();
        return response()->json($post);
    }

    public function getPostsByCategory($slug_category){
        $category = Category::where('slug',$slug_category)->with('posts')->first();
        return response()->json($category);
    }

    /* public function getPostsByTags($slug_tag){
        $tag = Tag::where('slug', $slug_tag)->with('posts')->first();

        return response()->json($tag);
    }
    */
}
