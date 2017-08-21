@extends('layout.master')
@section('content')

    <!-- Intro -->
    <div id="intro">
        <h1>This is<br />
        Massively</h1>
        <p>A free, fully responsive HTML5 + CSS3 site template designed by <a href="https://twitter.com/ajlkn">@ajlkn</a> for <a href="https://html5up.net">HTML5 UP</a><br />
        and released for free under the <a href="https://html5up.net/license">Creative Commons license</a>.</p>
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
                <p>Aenean ornare velit lacus varius enim ullamcorper proin aliquam<br />
                facilisis ante sed etiam magna interdum congue. Lorem ipsum dolor<br />
                amet nullam sed etiam veroeros.</p>
            </header>
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