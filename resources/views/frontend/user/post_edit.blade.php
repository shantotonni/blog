@extends('frontend.app')

@section('title')
    User Edit Post
@endsection

@push('css')

@endpush

@section('content')

    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="container wrap">
            <div class="col-md-12 content-left">
                <div class="articles">
                    <header>
                        <h3 class="title-head">User Edit Post</h3>
                    </header>
                    <br>
                    <a href="{{ route('user.post') }}" class="pull-right btn btn-primary">Back</a>
                    <div class="contact_grid">
                        <div class="col-md-12 contact-top">
                            <form action="{{ route('user.update.post',$post->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="to">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    @if ($post->category_id == $category->id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <div class="error" style="color: red">{{ $errors->first('category_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <select name="tag_id[]" id="" class="form-control select2" data-placeholder="Select Tags" multiple="multiple">
                                                <option value="">Select Tag</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        @foreach ($post->tags as $posttag)
                                                            {{ $posttag->id == $tag->id ? 'selected':'' }}
                                                        @endforeach
                                                    >
                                                        {{ $tag->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('tag_id'))
                                                <div class="error" style="color: red">{{ $errors->first('tag_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="to">
                                    <input type="text" style="width: 48.6%" class="text" value="{{ $post->title }}" placeholder="Please Select Title" name="title">
                                    @if ($errors->has('title'))
                                        <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                                    @endif
                                </div>

                                <textarea name="body" placeholder="Please write Somethings">{{ $post->body }}</textarea>
                                @if ($errors->has('body'))
                                    <div class="error" style="color: red">{{ $errors->first('body') }}</div>
                                @endif
                                <br>
                                <div class="to">
                                    <input type="file" class="text" placeholder="Please Select Image" name="image">
                                    @if ($errors->has('image'))
                                        <div class="error" style="color: red">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>
                                <br>
                                <div class="to">
                                    <input type="text" style="width: 48.6%" class="text" value="{{ $post->image_caption }}" placeholder="Please Select Image Caption" name="image_caption">
                                    @if ($errors->has('image_caption'))
                                        <div class="error" style="color: red">{{ $errors->first('image_caption') }}</div>
                                    @endif
                                </div>
                                <br>
                                <div class="form-submit1">
                                    <input name="submit" type="submit" id="submit" value="Update Your Post"><br>
                                </div>
                                <div class="clearfix"> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });

        CKEDITOR.replace( 'body' );
    </script>

@endsection





