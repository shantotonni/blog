@extends('admin.layouts.master')

@section('title')
    User List
@endsection

@push('css')
    <link href="{{ asset('assets/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>User List</h4>
        </div>
    </div>

    <div class="br-pagebody">
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
        @if(session()->has('delete'))
            <div class="alert alert-danger">
                {{ session()->get('delete') }}
            </div>
        @endif

        <div class="br-section-wrapper">
            <a href="{{ route('admin.user.create') }}" class="btn btn-teal mg-b-10 float-right">Add User</a>
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Category List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">Serial No</th>
                        <th class="wd-15p">User name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Email</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Gender</th>
                        <th class="wd-15p">Action</th>
                    </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @if (!empty($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/user/'.$user->avatar) }}" width="80px" height="80px" alt="{{ asset('img/no.png') }}">
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender }}</td>

                                    <td>
                                        <a href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.user.delete',$user->id) }}" onclick="confirm('Are you sure you want to delete this item')" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/lib/datatables/jquery.dataTables.js') }}"></script>

    <script>
        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>

@endpush

