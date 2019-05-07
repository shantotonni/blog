@extends('admin.layouts.master')

@section('title')
    User Create
@endsection

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div><h4>User</h4></div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add User</h6>
            <div class="form-layout form-layout-1">
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter User Name">
                                @if ($errors->has('name'))
                                    <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" placeholder="Enter User Email">
                                @if ($errors->has('email'))
                                    <div class="error" style="color: red">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Phone: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="phone" placeholder="Enter User Phone">
                                @if ($errors->has('phone'))
                                    <div class="error" style="color: red">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <div class="error" style="color: red">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">User Password: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="Enter User Password">
                                @if ($errors->has('password'))
                                    <div class="error" style="color: red">{{ $errors->first('password') }}</div>
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
