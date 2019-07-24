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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Faculty Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('faculty.update',$faculty->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Faculty Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $faculty->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Profile Photo</label><br>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Designation </label>
                                                <input type="text" class="form-control" name="designation" value="{{ $faculty->designation }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email Address</label>
                                                <input type="email" class="form-control" name="email" value="{{ $faculty->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Phone</label>
                                                <input type="number" class="form-control" name="phone" value="{{ $faculty->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Address</label>
                                                <textarea type="text" class="form-control" name="address">{{ $faculty->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <a href="{{ route('faculty.index') }}" class="btn btn-danger">Back</a>
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