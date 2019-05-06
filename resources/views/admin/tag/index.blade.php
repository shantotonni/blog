@extends('admin.layouts.master')

@section('title')
    Tags List
@endsection

@push('css')
    <link href="{{ asset('assets/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Tags List</h4>
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
            <a href="{{ route('tag.create') }}" class="btn btn-teal mg-b-10 float-right">Add Tag</a>
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Tags List</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">Serial No</th>
                        <th class="wd-15p">Tag name</th>
                        <th class="wd-15p">Created At</th>
                        <th class="wd-15p">Action</th>
                    </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @if (!empty($tags))
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('tag.delete',$tag->id) }}" onclick="confirm('Are you sure you want to delete this item')" class="btn btn-danger btn-sm">Delete</a>
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

