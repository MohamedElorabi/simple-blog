@extends('master')


@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">

   <!--<h1 class="page-header">
        Page Heading
        <small>Secondary Text</small>
    </h1>-->

 
    <h2>
        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
    </h2>

    <!---<p class="lead">
        by <a href="index.php">Start Bootstrap</a>
    </p>-->

    <p><span class="glyphicon glyphicon-time"></span>

        Posted on {{ $post->created_at->toDayDateTimeString()  }}
        

    </p>

    @if ($post->url)

        <p><img src="../uplaod/{{ $post->url }}"></p>

    @endif



    <p>{{ $post->body }}</p>

    <br>

    <div class="comments">
        
        @foreach ($post->comments as $comment)


            <div class="comment">
                <p class="comment-time">
                    <span class="glyphicon glyphicon-time"></span>
                    {{ $comment->created_at->diffForHumans() }}
                </p>
                <p class="comment-text">{{ $comment->body }}</p>
            </div>
            

        @endforeach

    </div>

    <br>

    @if($stop_comment == 1)

    <h3>Oops!! Comments Are Currently Closed!!</h3>

    @else
    
    <form method="POST" action="/posts/{{ $post->id }}/store">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="body">Write Something . . .</label>
            <textarea name="body" id="body" class="form-control"></textarea>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>

    </form>

    @endif


    <!-- Pager 
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>-->

</div>
@stop