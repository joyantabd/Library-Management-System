@extends('layouts.app')

@section('title','Student')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <a href="{{route('student.create')}}" class="btn btn-info">Add New student</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Student Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Phone Number</th>
                                    <th>Father's Name</th>
                                    <th>Mother's Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key=>$student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td><img src="{!! asset('uploads/student/'.$student->photo) !!}" class="img rounded-circle" style="width:100px"></td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->f_name }}</td>
                                            <td>{{ $student->m_name }}</td>
                                            <td>{{ $student->created_at }}</td>
                                            <td>
                                                <a href="{{ route('student.show',$student->id) }}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                                                <form id="delete-form-{{ $student->id }}" action="{{ route('student.destroy',$student->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $student->id }}').submit();
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
                                    <th>Phone Number</th>
                                    <th>Father's Name</th>
                                    <th>Mother's Name</th>
                                    <th>Created At</th>
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