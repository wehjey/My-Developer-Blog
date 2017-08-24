@extends('admin.layout.master')
@section('content')

<!-- Add content here -->
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-comments"></i>
        </div>
        <div class="mr-5">
          {{$totalPost}} Total Posts
        </div>
      </div>
      <a href="{{route('posts')}}" class="card-footer text-white clearfix small z-1">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-fire"></i>
        </div>
        <div class="mr-5">
          {{$totalPublished}} Published Posts
        </div>
      </div>
      <a href="{{route('posts')}}" class="card-footer text-white clearfix small z-1">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-list"></i>
        </div>
        <div class="mr-5">
          {{$totalDraft}} in Draft 
        </div>
      </div>
      <a href="{{route('posts')}}" class="card-footer text-white clearfix small z-1">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-support"></i>
        </div>
        <div class="mr-5">
          {{$totalViews}} Total Posts Views
        </div>
      </div>
      <a href="#" class="card-footer text-white clearfix small z-1">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>


<hr class="mt-2">

<div class="mb-0 mt-4">
  <i class="fa fa-fire"></i>
  Hottest Post</div>

  <br/>

<div class="card-columns">
  <div class="card mb-3">
    <a href="{{route('view',$hottestPost->slug)}}" target="_blank">
      <img class="card-img-top img-fluid w-100" src="{{url($hottestPost->image->image_url)}}" alt="">
    </a>
    <div class="card-body">
      <h6 class="card-title mb-1">
        by {{$hottestPost->user->name}}
      </h6>
    </div>
    <hr class="my-0">
    <div class="card-body py-2 small">
      <a class="mr-3 d-inline-block" href="#">
        {{$hottestPost->views}} Views
      </a>
      <a class="mr-3 d-inline-block" href="#">
        0 Comments
      </a>
    </div>
    <div class="card-footer small text-muted">
      Posted {{$hottestPost->created_at->diffForHumans()}}
    </div>
  </div>
</div>


@endsection