<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostAudio;
use App\Models\PostCategory;
use App\Models\PostImage;
use App\Models\PostVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use File;

class CustomerController extends Controller
{
    public function getProfile()
    {
        return view('customer.profile');
    }

    // Post Campaign
    public function postCampaign(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required',
            'description' => 'required',
        ]);

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->post_category_id = $request->category;
        $post->topic = $request->topic;
        $post->description = $request->description;
        $post->approval_status = 'pending';
        $post->save();
        // Check if post has Audio, Video and Image
        // Image upload
        if ($request->hasFile('image')) {
            $postImage = new PostImage();
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $imageLocation = public_path('img/posts') . "/" . $imageName;
            $image = Image::make($image)->save($imageLocation);
            $postImage->post_id = $post->id;
            $postImage->image = $imageName;
            $postImage->save();
        }
        // Video Upload
        if ($request->hasFile('video')) {
            $postVideo = new PostVideo();
            $video = $request->file('video');
            $videoName = time() . "." . $video->getClientOriginalExtension();
            $videoLocation = public_path('img/posts');
            $video->move($videoLocation, $videoName);
            $postVideo->post_id = $post->id;
            $postVideo->video = $videoName;
            $postVideo->save();
        }
        // Video Upload
        if ($request->hasFile('audio')) {
            $postAudio = new PostAudio();
            $audio = $request->file('audio');
            $audioName = time() . "." . $audio->getClientOriginalExtension();
            $audioLocation = public_path('img/posts');
            $audio->move($audioLocation, $audioName);
            $postAudio->post_id = $post->id;
            $postAudio->audio = $audioName;
            $postAudio->save();
        }


        return redirect('/')->with('message', 'Post Successfully Added');
    }

    // Add Category
    public function addCategory(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            // 'description' => 'required',
        ]);
        $category = new PostCategory;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect()->back()->with('message', 'Category Successfully Added');
    }
}
