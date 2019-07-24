@extends('layouts.app')

@section('title','Borrow')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <a href="{{route('borrow.create')}}" class="btn btn-info">Add New Issue</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Borrow Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                <th>ID</th>
                                <th>Book Name</th>
                                <th>Faculty Name(if_taken)</th>
                                <th>Student Name(if_taken)</th>
                                <th>Borrow Date</th>
                                <th>Return  Date</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($borrows as $key=>$borrow)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $borrow->book_name }}</td>
                                        <td>{{ $borrow->faculty_name }}</td>
                                        <td>{{ $borrow->student_name }}</td>
                                        <td>{{ $borrow->created_at}}</td>
                                        <td>{{ $borrow->return_date }}</td>
                                        <td>
                                            <a href="{{ route('borrow.edit',$borrow->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $borrow->id }}" action="{{ route('borrow.destroy',$borrow->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $borrow->id }}').submit();
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
                                    <th>Faculty Name(if_taken)</th>
                                    <th>Student Name(if_taken)</th>
                                    <th>Borrow Date</th>
                                    <th>Return  Date</th>
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