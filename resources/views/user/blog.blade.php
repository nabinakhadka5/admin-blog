@extends('user/app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@section('title','Nabina Blog')
@section('bg-img',asset('user/img/home-bg.jpg'))
@section('sub-heading','Blog:Learn together, and grow together')
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach ($posts as $post)
                    <div class="post-preview">

                    <a href="{{ route('post',$post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by: {{ $post->posted_by }} <a href="" @click.prevent><i class="fa fa-thumbs-up"></a></i>
                        {{$post->created_at->diffForHumans()}}</p>
                </div>
                @endforeach
                <hr>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{ $posts->links() }}

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
    @endsection

