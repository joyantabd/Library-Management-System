@extends('layouts.app')

@section('title','Book Info Edit')

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
                            <h4 class="card-title ">Edit Book Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form method="POST" action="{{ route('book.update',$book->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Book Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $book->name }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Writer Name</label>
                                            <input type="text" class="form-control" name="writer" value="{{ $book->writer }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Photo</label><br>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Edition</label>
                                            <input type="text" class="form-control" name="edition" value="{{ $book->edition }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">ISBN</label>
                                            <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Publication</label>
                                            <input type="text" class="form-control" name="publication" value="{{ $book->publication }}">
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('book.index') }}" class="btn btn-danger">Back</a>
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