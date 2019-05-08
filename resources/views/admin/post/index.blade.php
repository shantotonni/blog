@extends('admin.layouts.master')

@section('title')
    Post List
@endsection

@push('css')
    <link href="{{ asset('assets/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Post List</h4>
        </div>
    </div>

    <div class="br-pagebody">
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg') }}
            </div>
        @endif
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Post List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">S.No</th>
                        <th class="wd-15p">Post Title</th>
                        <th class="wd-15p">Post Image</th>
                        <th class="wd-15p">Category</th>
                        <th class="wd-15p">Created By</th>
                        <th class="wd-15p">Created At</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-15p">Action</th>
                    </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @if (!empty($posts))
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img class="img-full" height="100px" width="150px" src="{{ asset('storage/post/'.$post->image) }}">
                                    </td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if ($post->status ==1)
                                            <span style="color: green;font-weight: bold">Published</span>
                                            @else
                                            <a href="{{ route('admin.post.active',$post->id) }}" class="btn btn-info btn-sm">Active</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-primary btn-sm">Show</a>
                                        <a href="{{ route('admin.post.delete',$post->id) }}" onclick="confirm('Are you sure you want to delete this item')" class="btn btn-primary btn-sm">Delete</a>
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

