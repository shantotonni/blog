@extends('admin.layouts.master')

@section('title')
    Post Show
@endsection

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div><h4> Post Show</h4></div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"> Post Show</h6>
            <div class="contact_grid">

                <table class="table table-bordered">

                    <tbody>
                    <tr>
                        <td>Image</td>
                        <td>  <img src="{{ asset('storage/post/'.$post->image) }}" width="80px" height="80px" alt="{{ asset('img/no.png') }}"></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $post->title }}</td>

                    </tr>

                    <tr>
                        <td>Post By</td>
                        <td>{{ $post->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ ucfirst($post->category->name) }}</td>
                    </tr>
                    <tr>
                        <td>Body</td>
                        <td>{!! $post->body !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
