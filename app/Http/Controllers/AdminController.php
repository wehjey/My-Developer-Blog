<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddPostRequest, App\Http\Requests\EditPostRequest;
use App\Services\PostService;
use App\Models\Post;

class AdminController extends Controller
{
    public function __construct(PostService $ps){
        $this->middleware('auth');
        $this->post = $ps;
    }

    public function dashboard(){
        $post = Post::all();
        $totalViews = 0;
        
        foreach($post as $ps){
            $totalViews += $ps->views;
        }

        $data = [
            'title' => 'Dashboard | My Developer Blog',
            'pageLabel' => 'Home',
            'totalPost' => $post->count(),
            'totalPublished' => $post->where('published',1)->count(),
            'totalDraft' => $post->where('published',0)->count(),
            'totalViews' => $totalViews,
            'hottestPost' => Post::orderBy('views','desc')->first()
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

    /**
     * Show edit post page
     */
    public function showEditPost($slug){

        $post = Post::where('slug',$slug)->with('image')->first();
        
        $title = 'Editing '.$post->title.' | My Developer Blog';

        $data = [
            'title' => $title,
            'pageLabel' => 'Editing '.$post->title,
            'post' => $post
        ];
        return view('admin.pages.post.edit',$data);
    }
    
    /**
     * Edit blog post
     */
    public function editPost(EditPostRequest $request){
        return $this->post->edit($request);
    }
}
