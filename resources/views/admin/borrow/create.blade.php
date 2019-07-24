@extends('layouts.app')

@section('title','borrow')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @include('layouts.partial.msg')

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">New Book Issue</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('borrow.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Book Name</label>
                                                <select class="form-control" name="book_name">
                                                    @foreach($books as $book)
                                                        <option value="{{ $book->name }}">{{ $book->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Faculty Name(if applicable)</label>
                                                <select class="form-control" name="faculty_name">
                                                    <option value="N/A">N/A</option>
                                                    @foreach($facultys as $faculty)
                                                        <option value="{{ $faculty->name }}">{{ $faculty->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Student Name(if applicable)</label>
                                                <select class="form-control" name="student_name">
                                                    <option value="N/A">N/A</option>
                                                    @foreach($students as $student)

                                                        <option value="{{ $student->name }}">{{ $student->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <a href="{{ route('borrow.index') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush