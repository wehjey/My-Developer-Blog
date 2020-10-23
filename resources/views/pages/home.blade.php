@extends('layout.master')
@section('content')

    <!-- Intro -->
    <div id="intro">
        <!-- Add gravater here -->
        <img class="img-circle img-responsive avatar" alt="Weje Emmanuel" src="{{ get_gravatar('wejemm@yahoo.com') }}">
        <p class="">
        <span class="name"><span class="surname">Emmanuel</span> Weje</span>
        <br/>
        <span class="position">
        Creative Designer/Software Developer & Founder of <a target="_blank" href="http://www.nerdworks.com.ng">Nerd Works Nigeria</a>
        </span>
        </p>
        <ul class="actions">
            <li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
        </ul>
    </div>

    <!-- Navigation Menu -->
    @include('_includes.nav')

    
    <!-- Main -->
    <div id="main">

        <!-- Featured Post -->
        <article class="post featured">
            <header class="major">
                <?php $date = \Carbon\Carbon::now() ?>
                <span class="date">{{formatDate($date)}}</span>
                <h2><a href="#">{{'</Welcome>'}} to<br />
                my developer blog</a></h2>
                <hr/>
            </header>
            <h3>//Latest_Post</h3>
            <a href="{{route('view', $latest->slug)}}" class="image main"><img src="{{url($latest->image->image_url)}}" alt="" /></a>
            <ul class="actions">
                <li><a href="{{route('view', $latest->slug)}}" class="button big">View</a></li>
            </ul>
        </article>

        <!-- Posts -->
        <section class="posts">
        @foreach($posts as $post)
            <article>
                <header>
                    <span class="date">{{formatDate($post->created_at)}}</span>
                </header>
                <a href="{{route('view', $post->slug)}}" class="image fit"><img src="{{url($post->image->image_url)}}" alt="{{$post->slug}}" /></a>
                <span class="author">by {{$post->user->name}}</span>
                <ul class="actions">
                    <li><a href="{{route('view', $post->slug)}}" class="button">View</a></li>
                </ul>
            </article><!-- End article -->
        @endforeach
        </section>

        <!-- Footer -->
        <footer>
        {{ $posts->links() }}
        </footer>

    </div>


@endsection