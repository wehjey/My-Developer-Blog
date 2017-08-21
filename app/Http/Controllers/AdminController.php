<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest;
use App\Services\PostService;
use App\Models\Post;

class AdminController extends Controller
{
    public function __construct(PostService $ps){
        $this->middleware('auth');
        $this->post = $ps;
    }

    public function dashboard(){
        $data = [
            'title' => 'Admin | My Developer Blog',
            'pageLabel' => 'Home'
        ];
        return view('admin.pages.dashboard',$data);
    }

    //Display all posts
    public function showPosts(){
        $data = [
            'title' => 'Posts | My Developer Blog',
            'pageLabel' => 'Posts',
            'posts' => Post::all()
        ];
        return view('admin.pages.post.index',$data);
    }

    //Show add post page
    public function showAddPost(){
        $data = [
            'title' => 'Add new post | My Developer Blog',
            'pageLabel' => 'Posts'
        ];
        return view('admin.pages.post.create',$data);
    }

    //Create new blog post
    public function insertPost(AddPostRequest $request){
        return $this->post->create($request);
    }

    //Publish blog post
    public function publishPost($slug){
        return $this->post->publish($slug);
    }

    //Suspend blog post
    public function suspendPost($slug){
        return $this->post->suspend($slug);
    }

    //Discard blog post
    public function discardPost($slug){
        return $this->post->discard($slug);
    }
}
