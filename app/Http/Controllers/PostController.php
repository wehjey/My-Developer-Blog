<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function home(){
        $data = [
            'title' => 'My Developer Blog',
            'page' => 'home',
            'posts' => Post::where('published',1)->with('image')->latest()->paginate(8),
            'latest' => Post::where('published',1)->with('image')->latest()->first()
        ];
        
    return view('pages.home',$data);
    }

    public function show($slug){
        $post = Post::where('slug',$slug)->with(['image','user'])->first();
        $post->views += 1;
        $post->save();
        $data = [
            'title' => $post->title.' | My Developer Blog',
            'page' => 'post',
            'post' => $post
        ];
    return view('pages.post',$data);
    }
}
