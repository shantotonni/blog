@extends('admin.layouts.master')

@section('title')
    User Edit
@endsection

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div><h4>User</h4></div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Edit User</h6>
            <div class="form-layout form-layout-1">
                <form action="{{ route('admin.user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter User Name">
                                @if ($errors->has('name'))
                                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $user->email }}" name="email" placeholder="Enter User Email">
                                @if ($errors->has('email'))
                                    <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ $user->phone }}" name="phone" placeholder="Enter User Phone">
                                @if ($errors->has('phone'))
                                    <div class="error" style="color: red">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select Gender</option>
                                    @if ($user->gender == 'male')
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                        @else
                                        <option value="female" selected>Female</option>
                                        <option value="male" selected>Male</option>
                                    @endif


                                </select>
                                @if ($errors->has('gender'))
                                    <div class="error" style="color: red">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="avatar" placeholder="Enter User Avatar">
                                @if ($errors->has('avatar'))
                                    <div class="error" style="color: red">{{ $errors->first('avatar') }}</div>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="form-layout-footer">
                        <button class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
