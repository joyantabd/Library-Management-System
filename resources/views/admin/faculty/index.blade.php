@extends('layouts.app')

@section('title','Faculty')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <a href="{{route('faculty.create')}}" class="btn btn-info">Add New Faculty</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Faculty Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($faculties as $key=>$faculty)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $faculty->name }}</td>
                                            <td><img src="{!! asset('uploads/faculty/'.$faculty->image) !!}" class="img rounded-circle" style="width:100px"></td>
                                            <td>{{ $faculty->designation }}</td>
                                            <td>{{ $faculty->email }}</td>
                                            <td>{{ $faculty->phone }}</td>
                                            <td>{{ $faculty->address }}</td>
                                            <td>{{ $faculty->created_at }}</td>
                                            <td>{{ $faculty->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('faculty.edit',$faculty->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $faculty->id }}" action="{{ route('faculty.destroy',$faculty->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $faculty->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
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