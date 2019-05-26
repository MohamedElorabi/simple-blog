@extends('master')


@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

    <h1 class="page-header">
        Welcome to our bolg
        <small>All posts here</small>
    </h1>

    <!--Blog Posts -->

    @foreach ($posts as $post)

    <h2>
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    </h2>

    <!---<p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>-->

    <p><span class="glyphicon glyphicon-time"></span>

        Posted on {{ $post->created_at}}

    </p>

    @if ($post->url)

        <p><img src="../uplaod/{{ $post->url }}"></p>

    @endif



    <p>{{ $post->body }}</p>
    <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>

	@endforeach


    <form method="POST" action="/posts/store" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="url">Image</label>
            <input id="url" type="file" name="url">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Post</button>
        </div>

    </form>


    <div>
        
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach

    </div>
    <!-- Pager -->
 <!--   <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>
-->
</div>
@stop