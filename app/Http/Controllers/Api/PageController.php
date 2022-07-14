<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        //$posts = Post::orderBy('id')->paginate(10);
        $posts = Post::with(['category','tags'])->paginate(10);

        return response()->json($posts);
    }
}
