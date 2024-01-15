@extends('portal.app')
@section('sc-css')
<link href="{{ url('assets/02-Single-post/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('assets/02-Single-post/css/responsive.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="single-post">
    <div class="image-wrapper"><img src="{{ url($posts->banner) }}" alt="Blog Image"></div>

    <div class="icons">
        <div class="left-area">
            <a class="btn caegory-btn" href="#"><b>{{ $posts->category->category_id }}</b></a>
        </div>
        <ul class="right-area social-icons">
            <li><a href="#"><i class="ion-android-textsms"></i>{{ count($data['comment']) }}</a></li>
        </ul>
    </div>
    <p class="date"><em>{{ date('D, M Y', strtotime($posts->created_at)) }}</em></p>
    <h3 class="title"><a href="#"><b class="light-color">{{ $posts->title }}</b></a></h3>
    {!! $posts->content !!}

</div>
<!-- single-post -->


<div class="post-author">
    <div class="author-image"><img src="{{ url($data['user']->image) }}" alt="{{$data['user']->name}}"></div>

    <div class="author-info">
        <h4 class="name"><b class="light-color">{{ $data['user']->name }}</b></h4>

        {!! $data['user']->desc !!}

        {{-- <ul class="social-icons">
            <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
            <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
        </ul> --}}
        <!-- right-area -->

    </div>
    <!-- author-info -->
</div>
<!-- post-author -->

<div class="comments-area">
    <h4 class="title"><b class="light-color">{{ count($data['comment']) }} Comments</b></h4>

    @foreach ($data['comment'] as $comment)
    <div class="comment">
        <div class="author-image"><img src="{{ url('assets/images/author-2-150x150.jpg') }}" alt="Autohr Image"></div>
        <div class="comment-info">
            <h5><b class="light-color">{{ $comment->name }}</b></h5>
            <h6 class="date"><em>{{ date('D, M Y', strtotime($comment->created_at)) }}</em></h6>
            <p>{{ $comment->comment }}</p>
        </div>
    </div>
    @endforeach

    <!-- comment -->



</div>
<!-- comments-area -->

<div class="leave-comment-area">
    <h4 class="title"><b class="light-color">Leave a comment</b></h4>
    <div class="leave-comment">

        <form method="post" action="{{ url('comment') }}">
            @csrf
            <input type="hidden" name="posts_id" value="{{ $posts->id }}">
            <div class="row">
                <div class="col-sm-6">
                    <input name="name" class="name-input" type="text" placeholder="Name">
                </div>
                <div class="col-sm-6">
                    <input name="email" class="email-input" type="text" placeholder="Email">
                </div>
                <div class="col-sm-12">
                    <input name="subject" class="subject-input" type="text" placeholder="Subject">
                </div>
                <div class="col-sm-12">
                    <textarea class="message-input" name="comment" rows="6" placeholder="Message"></textarea>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-2" type="submit"><b>COMMENT</b></button>
                </div>

            </div>
            <!-- row -->
        </form>

    </div>
    <!-- leave-comment -->

</div>
<!-- comments-area -->
@endsection
