@extends('admin.layouts.master')

@section('title')
    Category Edit
@endsection

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div><h4>Category</h4></div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit Category</h6>
            <div class="form-layout form-layout-1">
                <form action="{{ route('tag.update',$tag->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $tag->name }}">
                                @if ($errors->has('name'))
                                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Update</button>
                        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
