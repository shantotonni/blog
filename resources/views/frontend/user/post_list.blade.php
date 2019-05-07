
@extends('frontend.app')
@section('title')
    My Article
@endsection
@section('content')

    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="container wrap">
            <div class="col-md-12 content-left">
                <div class="articles">
                    <header>
                        <h3 class="title-head">My Article</h3>
                    </header>
                    <br>
                    <a href="{{ route('user.create.post') }}" class="pull-right btn btn-primary">Create Post</a>
                    <div class="contact_grid">

                        <table class="table table-bordered">

                            <tbody>
                            <tr style="background-color: #3fa079">
                                <td>Title</td>
                                <td>Category</td>
                                <td>Tag</td>
                                <td>Post Create Date</td>
                                <td>Status</td>
                                <td>Action</td>

                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ isset($post->category->name)?$post->category->name:'' }}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            {{ $tag->name }},
                                            @endforeach
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if($post->status==1)
                                            <span style="color: #3fa079">Published</span>
                                        @else
                                            <span style="color: red">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit.post',$post->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('user.delete.post',$post->id) }}" onclick="return confirm('Are you sure you want to delete this Article?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection





