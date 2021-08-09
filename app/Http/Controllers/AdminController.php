<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::all();
        $users = User::all();
        return view('admin.dashboard')->with('posts', $posts)->with('users', $users);
    }
    // See Users List
    public function getUsers()
    {
        $users = User::where('role', '!=', 'superadmin')->get();
        return view('admin.users')->with('users', $users);
    }
    // See Post List
    public function getPosts()
    {
        $posts = Post::all();
        return view('admin.posts')->with('posts', $posts);
    }
    // Approve Posts
    public function changePostStatus($id)
    {
        $post = Post::find($id);
        if ($post->approval_status == 'pending') {
            $post->approval_status = 'approved';
        } else {
            $post->approval_status = 'pending';
        }
        $post->save();
        return redirect()->back();
    }
}
