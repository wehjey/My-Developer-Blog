<?php

namespace App\Services;

use App\Models\Post, App\Models\Image;
use Illuminate\Support\Facades\DB;
use Auth, Cloudder;

class PostService
{
    
  public function create($request){

    DB::beginTransaction();
    
    try{

      $published = 0;

      if($request['publish']){
        $published = 1;
      }

      $post = new Post();
      $post->title = $request['title'];
      $post->content = $request['content'];
      $post->introduction = $request['introduction'];
      $post->slug = str_slug($request['title']);
      $post->user_id = Auth::id();
      $post->published = $published;
      $post->save();

      if($request->hasFile('image')){

        $image = $request['image'];
        $extension = $image->getClientOriginalExtension();       
        $filename = str_random(15).'.'.$extension;
        $path = $request->file('image')->storeAs('public/posts',$filename);
        $image_url = 'storage/posts/'.$filename;
       
        $img = new Image();
        $img->post_id = $post->id;
        $img->image_url = $image_url;
        $img->save();
        
      }

      DB::commit();
    }
    catch(Exception $e){
      DB::rollback();
      return back()->with('error', 'Oops!!! An error occurred while trying to save this post. Please try again.');
    }

    if($request['publish']){
      return  redirect()->route('posts')->with('success', 'Your post has been published successfully.');
    }else{
      return  redirect()->route('posts')->with('success', 'Your post has been saved successfully.');
    }
  }
  
  public function publish($slug){

    try{
      $post = Post::where('slug',$slug)->first();
      $post->published = true;
      $post->save();
    }
    catch(Exception $e){
      return back()->with('error', 'Oops!!! An error occurred while trying to publish this post. Please try again.');
    }

    return back()->with('success', 'Post published successfully');

  }

  public function suspend($slug){

    try{
      $post = Post::where('slug',$slug)->first();
      $post->published = false;
      $post->save();
    }
    catch(Exception $e){
      return back()->with('error', 'Oops!!! An error occurred while trying to suspend this post. Please try again.');
    }

    return back()->with('success', 'Post suspended successfully');

  }

  public function discard($slug){

    try{
      Post::where('slug',$slug)->first()->delete();
    }
    catch(Exception $e){
      return back()->with('error', 'Oops!!! An error occurred while trying to discard this post. Please try again.');
    }

    return back()->with('success', 'Post discarded successfully');

  }

  public function edit($request){
    
    DB::beginTransaction();
    
    try{

      $published = 0;

      if($request['publish']){
        $published = 1;
      }

      $post = Post::find($request['post_id']);
      $post->title = $request['title'];
      $post->content = $request['content'];
      $post->introduction = $request['introduction'];
      $post->slug = str_slug($request['title']);
      $post->user_id = Auth::id();
      $post->published = $published;
      $post->save();

      if($request->hasFile('image')){

        $image = $request['image'];
        $extension = $image->getClientOriginalExtension();       
        $filename = str_random(15).'.'.$extension;
        $path = $request->file('image')->storeAs('public/posts',$filename);
        $image_url = 'storage/posts/'.$filename;
       
        $img = Image::where('post_id',$post->id)->first();

        if($img){
          $img->image_url = $image_url;
          $img->save();
        }
        else{
          $img = new Image();
          $img->post_id = $post->id;
          $img->image_url = $image_url;
          $img->save();
        }
        
      }

      DB::commit();
    }
    catch(Exception $e){
      DB::rollback();
      return back()->with('error', 'Oops!!! An error occurred while trying to save this post. Please try again.');
    }

    return redirect()->route('posts')->with('success', 'Post has been updated successfully');
  }

}
