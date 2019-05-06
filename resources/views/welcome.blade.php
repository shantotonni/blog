
@extends('frontend.app')

@section('content')

    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="container wrap">
            <div class="col-md-12 content-left">
                <div class="articles">
                    <header>
                        <h3 class="title-head">Latest Stories</h3>
                    </header>

                    @foreach($posts as $value)
                        <div class="article row">
                            <div class="article-left col-sm-5">
                                <a href=""><img class="img-full" src="{{ asset('article/'.$value->image) }}"></a>
                            </div>
                            <div class="article-right col-sm-7">
                                <div class="article-title">
                                    <p>
                                        <a class="span_link" href="" style="padding: 8px 15px;background-color: #63d3a1;color: #404040;font-weight: bold">{{ isset($value->category->name)?$value->category->name:'' }}
                                        </a>
                                    </p>
                                    <a class="title" href=""> {{ ucfirst($value->title ) }}</a>
                                </div>
                                <div class="article-text">
                                    <p>{!! substr($value->description,0,250) !!}.....</p>

                                    <p>
                                        <a href="" class="pull-left" style="text-decoration: none;color: red">{{ isset($value->user->first_name)?$value->user->first_name:'' }}</a>
                                        <span class="span_link pull-right">{{ $value->created_at->diffForHumans() }} </span>
                                    </p>

                                </div>
                            </div>
                            {{--<div class="clearfix"></div>--}}
                        </div>

                    @endforeach

                </div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- content-section-ends-here -->

@endsection





