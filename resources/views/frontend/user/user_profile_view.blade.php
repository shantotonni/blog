
@extends('frontend.app')
@section('title')
    User Profile
@endsection
@section('content')

    <!-- content-section-starts-here -->
    <div class="main-body">
        <div class="container wrap">
            <div class="col-md-12 content-left">
                <div class="articles">
                    <header>
                        <h3 class="title-head">User Profile</h3>
                    </header>
                    <br>
                    <a href="{{ route('user.profile.edit',$profile->id) }}" class="pull-right btn btn-primary">Edit Profile</a>
                    <div class="contact_grid">

                        <table class="table table-bordered">

                            <tbody>
                            <tr>
                                <td>Image</td>
                                <td>  <img src="{{ asset('storage/user/'.$profile->avatar) }}" width="80px" height="80px" alt="{{ asset('img/no.png') }}"></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>{{ $profile->name }}</td>

                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ $profile->email }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ ucfirst($profile->gender) }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $profile->phone }}</td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td>{{ $profile->date_of_birth }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





