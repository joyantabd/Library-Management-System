@extends('layouts.app')


@section('title','')


@push('css')

@endpush


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">library_books</i>
                            </div>
                            <p class="card-category">Total Books/Avilable Books</p>
                            <h3 class="card-title">{{ $bookCount }} / {{ $books->count() }}
                                <small>Pcs</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">warning</i>
                                <a href="{{route('book.index')}}">Get More Details...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">perm_contact_calendar</i>
                            </div>
                            <p class="card-category">Total Faculty</p>
                            <h3 class="card-title">{{ $facultyCount }}
                                <small>Total</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">chrome_reader_mode</i>
                            </div>
                            <p class="card-category">Total Student</p>
                            <h3 class="card-title">{{ $studentCount }}
                                <small>Total</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">credit_card</i>
                            </div>
                            <p class="card-category">Total Issue</p>
                            <h3 class="card-title">{{ $borrowCount }}
                                <small>Total</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>

            </div>

            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
