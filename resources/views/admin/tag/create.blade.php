@extends('admin.layouts.master')

@section('title')
    Tag Create
@endsection

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div><h4>Tag</h4></div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Tag</h6>
            <div class="form-layout form-layout-1">
                <form action="{{ route('tag.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tag Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter Tag Name">
                                @if ($errors->has('name'))
                                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Submit</button>
                        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
