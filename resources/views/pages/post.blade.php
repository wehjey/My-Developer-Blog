@extends('layout.master')
@section('content')
<!-- Nav -->
@include('_includes.nav')

<!-- Main -->
<div id="main">

    <!-- Post -->
        <section class="post">
            <header class="major">
                <span class="date">{{formatDate($post->created_at)}}</span>
                <h1>{{$post->title}}</h1>
                <p>{{$post->introduction}}</p>
            </header>
            <div class="image main"><img src="{{url($post->image->image_url)}}" alt="{{$post->title}}" /></div>
            {!! $post->content !!}
        </section>

</div>


@endsection