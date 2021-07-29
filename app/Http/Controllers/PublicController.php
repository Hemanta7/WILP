<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getHomepage()
    {
        $categories = PostCategory::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('public.homepage')->with('categories', $categories)->with('posts', $posts);
    }
}
