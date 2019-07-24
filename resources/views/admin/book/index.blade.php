@extends('layouts.app')

@section('title','Books')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <a href="{{route('book.create')}}" class="btn btn-info">Add New book</a><a href="{{route('borrow.create')}}" class="btn btn-success">Issue a Book Now</a>

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Books Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class=" text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Writer</th>
                                <th>Photo</th>
                                <th>Edition</th>
                                <th>ISBN</th>
                                <th>Publication</th>
                                <th>Status</th>
                                <th>Added in Library</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($books as $key=>$book)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->writer }}</td>
                                        <td><img src="{!! asset('uploads/book/'.$book->image) !!}" class="img rounded-circle" style="width:100px"></td>
                                        <td>{{ $book->edition }}</td>
                                        <td>{{ $book->isbn }}</td>
                                        <td>{{ $book->publication }}</td>
                                        <td>
                                            <form class="form-inline" action="{{ route('book.update1', $book->id) }}" method="POST">
                                                @csrf
                                                <select name="status">
                                                    <option value="">Current::{{$book->status}}</option>
                                                    <option value="1">1</option>
                                                    <option value="0">0</option>
                                                </select>
                                                <button type="submit" class="btn btn-success ml-1">Update</button>
                                            </form>
                                        </td>
                                        <td>{{ $book->created_at }}</td>
                                        <td>
                                            <a href="{{ route('book.edit',$book->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                            <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy',$book->id) }}" style="display: none;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $book->id }}').submit();
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
                                    <th>Writer</th>
                                    <th>Photo</th>
                                    <th>Edition</th>
                                    <th>ISBN</th>
                                    <th>Publication</th>
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