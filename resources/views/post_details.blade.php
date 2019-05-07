@extends('frontend.app')
@section('title')
    Discover | Single Post
@endsection
@section('content')
    <br>
    <div class="main-body" id="pjax_options">
        <div class="container wrap">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Single Post Details</li>
            </ol>
            <div class="single-page">
                <div class="row">
                    <div class="col-md-9 col-lg-9 content-left single-post">
                        <div class="blog-posts">

                            <h3 class="post">{{ ucfirst($post->title) }}</h3>

                            <div class="user-show">
                                <ul>
                                    <li style="margin: 0;padding: 0;font-size: 12px">Publish: {{ $post->created_at->diffForHumans() }}</li>
                                    <li style="margin: 0;padding: 0;font-size: 12px" class="pull-right">Post By: {{ $post->user->name }}</li>
                                </ul>
                            </div>
                            <br>
                            <img class="img-full" src="{{ asset('storage/post/'.$post->image) }}" style="width: 100%" alt="{{ asset('img/no.png') }}">
                            <div class="last-article" style="line-height: 200%">
                                <div class="description">{!! $post->body !!}</div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="user-show">
                                <ul>
                                    <li style="margin: 0;padding: 0;font-size: 12px">Tags:
                                        @foreach($post->tags as $tag)
                                            <a href="{{ route('tag.post',$tag->slug) }}" class="btn btn-primary btn-sm">{{ $tag->name }}</a>
                                            @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="life-style">
                            <header>
                                <p class="title-head text-center" style="font-size: 25px;color: #35b578">SIMILAR READS</p>
                                <hr>
                            </header>
                            <div class="row related-posts" style="margin: 0">
                                @foreach($posts as $value)

                                    @if($value->id != $post->id)
                                        <div class="col-xs-6 col-md-4 related-grids">
                                            <a href="{{ route('post.details',$post->slug) }}" class="thumbnail" style="margin: 0">
                                                <img style="width: 300px;height:168px " src="{{ asset('storage/post/'.$value->image) }}" alt=""/>
                                            </a>
                                            <h5>
                                                <a href="{{ route('post.details',$post->slug) }}" style="line-height: 25px">{{ ucfirst($value->title) }}</a>
                                            </h5>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                            <div class="response">
                                <h4 style="border-bottom: 1px solid #35b578;margin: 0;color: #35b578">Responses</h4>

                                @foreach($post->comments as $comment )
                                    <div class="media response-info">
                                        <div class="media-left response-text-left">
                                            <a href="#">
                                                <img class="media-object" src="{{ asset('user/'.$comment->user->image) }}" alt="No Image"/>
                                            </a>
                                            <h5><a href="#">{{ ucfirst(isset($comment->user->name) ? $comment->user->name:'') }}</a></h5>
                                        </div>
                                        <div class="media-body response-text-right">
                                            <p>{{ $comment->comment }}</p>
                                            <ul>
                                                <li>{{ $comment->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                @endforeach

                            </div>
                            <br>
                            <div class="coment-form" style="margin: 0px">
                                <h4>Leave your comment</h4>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <form action="{{ route('post.comment') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                                        <input type="text" name="title" placeholder="Please Enter Title" class="form-control">
                                        <textarea required="" name="comment" placeholder="Write Your Comment"></textarea>
                                        <input type="submit" value="Submit Your Comment">
                                    </form>
                                @else
                                    <h4>Please <a href="" data-toggle="modal" data-target="#login">Login</a></h4>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sidebar widget">
                            <h3 style="font-size: 20px">Recent Post</h3>
                            <ul>
                                @foreach($posts as $value)
                                    @if($value->id != $post->id)
                                        <li>
                                            <div class="sidebar-thumb">
                                                <a href="{{ route('post.details',$value->slug) }}">
                                                    <img class="animated rollIn" src="{{ asset('storage/post/'.$value->image) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="sidebar-content">
                                                <h5 class="animated bounceInRight"><a href="{{ route('post.details',$value->slug) }}">{{ ucfirst($value->title) }}</a></h5>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>

        .panel-default {
            border-color: #77eab4;
        }
        .panel {
            border-radius: 0px;
        }
        ul, li {
            list-style: none;
        }
        h5{
            margin: 0;

        }
        h3{
            color: #35b578;
            margin: 10px 0px 15px;
            padding-bottom:10px;
            padding-left: 10px;
            border-left: 5px solid #35b578;
        }
        .sidebar.widget {
            border: 1px solid #b6f7d0;
            padding: 10px 20px;
        }
        .sidebar.widget ul {
            margin: 0px;
            padding: 0;
            overflow: hidden;
        }
        .sidebar.widget ul li {
            overflow: hidden;
            font-size: 14px;
            margin-bottom: 20px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 20px
        }
        .sidebar-thumb{
            overflow: hidden;
        }
        .sidebar-thumb img{
            width: 100%;
            height: 130px;
        }
        .sidebar-content h5{
            font-size: 16px;
            cursor: pointer;
            line-height: 24px;
        }
        .sidebar-content h5 a:hover{
            color: #2996bd;
        }

        .sidebar-content h5 a{
            outline: 0 none;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .sidebar-meta{
            margin-top: 10px;
        }
        .sidebar-meta span{
            color: #2e2e2e;
        }
        .sidebar-meta span.time{
            /*margin-right: 10px;*/
        }
        .sidebar-meta span i{
            color: #35b578
        }
    </style>

@endsection





