@extends('layouts.app')

@section('title','Location Info Edit')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit location Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form method="POST" action="{{ route('location.update',$location->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Book Name</label>
                                            <select class="form-control" name="book_id">
                                                @foreach($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Room Number</label>
                                            <input type="text" class="form-control" name="room_no" value="{{ $location->room_no }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Self_no</label>
                                            <input type="text" class="form-control" name="self_no" value="{{ $location->self_no }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Column No</label>
                                            <input type="text" class="form-control" name="column_no" value="{{ $location->column_no }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Row Number</label>
                                            <input type="text" class="form-control" name="row_no" value="{{ $location->row_no }}">
                                        </div>
                                    </div>
                                </div>
                                <br>



                                <a href="{{ route('location.index') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
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