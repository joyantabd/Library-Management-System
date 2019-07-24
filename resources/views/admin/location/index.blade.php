@extends('layouts.app')

@section('title','location Location')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <a href="{{route('location.create')}}" class="btn btn-info">Add New location</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Location Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                <th>ID</th>
                                <th>Book Name</th>
                                <th>Room Number</th>
                                <th>Self Number</th>
                                <th>Column Number</th>
                                <th>Row Number</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($locations as $key=>$location)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $location->book->name }}</td>
                                        <td>{{ $location->room_no }}</td>
                                        <td>{{ $location->self_no }}</td>
                                        <td>{{ $location->column_no }}</td>
                                        <td>{{ $location->row_no }}</td>
                                        <td>{{ $location->created_at }}</td>
                                        <td>{{ $location->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('location.edit',$location->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $location->id }}" action="{{ route('location.destroy',$location->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $location->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Room Number</th>
                                    <th>Self Number</th>
                                    <th>Column Number</th>
                                    <th>Row Number</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>


                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        } );
    </script>
@endpush