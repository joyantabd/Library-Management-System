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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <form method="POST" action="{{ route('book.store') }}" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Book Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Writer Name</label>
                                            <input type="text" class="form-control" name="writer">
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
                                            <input type="text" class="form-control" name="edition">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">ISBN</label>
                                            <input type="text" class="form-control" name="isbn">
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Publication</label>
                                            <input type="text" class="form-control" name="publication">
                                        </div>
                                    </div>
                                </div>
                                <br>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Status</label>
                                            <select name="status">
                                                <option value="1">Select One</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('book.index') }}" class="btn btn-danger">Back</a>
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