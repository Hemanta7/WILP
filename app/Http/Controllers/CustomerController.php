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
        $categories = PostCategory::all();
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('customer.profile')->with('posts', $posts)->with('categories', $categories);
    }

    // Post Campaign
    public function postCampaign(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
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
            // $imageLocation = public_path('img/posts') . "/" . $imageName;
            $imageLocation = public_path('img/posts');
            $image->move($imageLocation, $imageName);
            // $image = Image::make($image)->save($imageLocation);
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

    // Edit Campaign
    public function editCampaign(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required',
            'topic' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        $post->post_category_id = $request->category;
        $post->topic = $request->topic;
        $post->description = $request->description;
        // dd(optional($post->image)->id);
        // Check if post has Audio, Video and Image
        // Image upload
        if ($request->hasFile('image')) {
            if (optional($post->image)->id) {
                $postImage = PostImage::find($post->image->id);
                File::delete(public_path('img/posts/' . $postImage->image));
                $image = $request->file('image');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                // $imageLocation = public_path('img/posts') . "/" . $imageName;
                $imageLocation = public_path('img/posts');
                $image->move($imageLocation, $imageName);
                // $image = Image::make($image)->save($imageLocation);                
                $postImage->image = $imageName;
                $postImage->save();
            } else {
                $postImage = new PostImage;
                $image = $request->file('image');
                $imageName = time() . "." . $image->getClientOriginalExtension();
                // $imageLocation = public_path('img/posts') . "/" . $imageName;
                $imageLocation = public_path('img/posts');
                $image->move($imageLocation, $imageName);
                // $image = Image::make($image)->save($imageLocation);
                $postImage->post_id = $post->id;
                $postImage->image = $imageName;
                $postImage->save();
            }
        }
        // Video Upload
        if ($request->hasFile('video')) {
            if (optional($post->video)->id) {
                $postVideo = PostVideo::find($post->video->id);
                File::delete(public_path('img/posts/' . $postVideo->video));
                $video = $request->file('video');
                $videoName = time() . "." . $video->getClientOriginalExtension();
                $videoLocation = public_path('img/posts');
                $video->move($videoLocation, $videoName);
                $postVideo->post_id = $post->id;
                $postVideo->video = $videoName;
                $postVideo->save();
            } else {
                $postVideo = new PostVideo();
                $video = $request->file('video');
                $videoName = time() . "." . $video->getClientOriginalExtension();
                $videoLocation = public_path('img/posts');
                $video->move($videoLocation, $videoName);
                $postVideo->post_id = $post->id;
                $postVideo->video = $videoName;
                $postVideo->save();
            }
        }
        // Audio Upload
        if ($request->hasFile('audio')) {
            if (optional($post->audio)->id) {
                $postAudio = PostAudio::find($post->audio->id);
                File::delete(public_path('img/posts/' . $postAudio->audio));
                $audio = $request->file('audio');
                $audioName = time() . "." . $audio->getClientOriginalExtension();
                $audioLocation = public_path('img/posts');
                $audio->move($audioLocation, $audioName);
                $postAudio->post_id = $post->id;
                $postAudio->audio = $audioName;
                $postAudio->save();
            } else {
                $postAudio = new PostAudio();
                $audio = $request->file('audio');
                $audioName = time() . "." . $audio->getClientOriginalExtension();
                $audioLocation = public_path('img/posts');
                $audio->move($audioLocation, $audioName);
                $postAudio->post_id = $post->id;
                $postAudio->audio = $audioName;
                $postAudio->save();
            }
        }
        $post->save();
        return back()->with('message', 'Post Successfully Updated');
    }

    // Delete Post
    public function deleteCampaign($id)
    {
        $post = Post::find($id);
        File::delete(public_path('img/posts/' . optional($post->image)->image));
        File::delete(public_path('img/posts/' . optional($post->video)->video));
        File::delete(public_path('img/posts/' . optional($post->audio)->audio));
        $post->image()->delete();
        $post->video()->delete();
        $post->audio()->delete();
        $post->delete();
        return back()->with('message', 'Post Successfully Deleted');
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
