@extends('user/app')

{{-- @section('bg-img',asset('user/img/home-bg.jpg')) --}}
@section('bg-img',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('sub-heading',$post->subtitle)

@section('main-content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=614316512573465&autoLogAppEvents=1" nonce="mTSFP4j0"></script>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <small>Created at: </small>{{ $post->created_at }} --}}
                    @foreach($post->categories as $category)
                    <a href="{{ route('category',$category->slug) }}">
                        <small class="pull-right" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding:5px;">{{ $category->name }}</small>
                    </a>
                    @endforeach
                {!!  htmlspecialchars_decode($post->body)  !!}

                <h1>Tags</h1>
                @foreach ($post->tags as $tag)
                <a href="{{ route('tag',$tag->slug) }}">
                    <small class="pull-left" style="margin-right: 20px;border-radius: 5px;border: 1px solid gray;padding: 5px;">
                    {{ $tag->name }}
                </small>
                 </a>
               @endforeach
                </div>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div>
            </div>
            <div>

        </div>
        </div>
    </article>

    <hr>
@endsection
