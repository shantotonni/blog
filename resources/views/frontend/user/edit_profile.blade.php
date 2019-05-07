
@extends('frontend.app')
@section('title')
    User Profile Edit
@endsection
@section('content')

    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="container wrap">
            <div class="col-md-12 content-left">
                <div class="articles">
                    <header>
                        <h3 class="title-head">User Profile Edit</h3>
                    </header>
                    <br>
                    <a href="{{ route('user.profile.view') }}" class="pull-right btn btn-primary">Back</a>
                    <div class="contact_grid">
                        <div class="col-md-12 contact-top">
                            <form action="{{ route('user.profile.update',$profile->id) }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="to">
                                    <img src="{{ asset('user/'.$profile->avatar) }}" width="120px" height="120px" alt="NO Image">
                                    <br>
                                    <br>
                                    <input type="file" class="text"  name="avatar" placeholder="Enter Your First Name">
                                </div>
                                <br>
                                <div class="to">
                                    <input type="text" class="text" value="{{ $profile->name }}" name="name" placeholder="Enter Your Name">
                                </div>

                                <div class="to">
                                    <input type="text" class="text" name="email" value="{{ $profile->email }}" placeholder="Enter Your Email">
                                </div>
                                <div class="to">
                                    <input type="text" class="text" name="phone" value="{{ $profile->phone }}" placeholder="Enter Your phone">
                                </div>

                                <div class="to">
                                    <select name="gender" id="" style="width: 47%"  class="form-control">
                                        <option value="">Select Gender</option>
                                        @if($profile->gender=='male')
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                        @elseif($profile->gender=='female')
                                            <option value="female" selected>Female</option>
                                            <option value="male">Male</option>
                                        @endif
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="to">
                                    <input type="text" class="text" data-provide="datepicker" name="date_of_birth" value="{{ $profile->date_of_birth }}" placeholder="Enter Your Birth Date">
                                </div>

                                <div class="form-submit1">
                                    <input name="submit" type="submit" id="submit" value="Update Profile"><br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.datepicker').datepicker();
    </script>

@endsection





