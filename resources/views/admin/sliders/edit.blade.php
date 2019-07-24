@extends('layouts.app')

@section('title','slider')

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
                            <h4 class="card-title ">Edit Slider Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Slider Name</label>
                                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Slider Image</label><br>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Button Text</label>
                                                <input type="text" class="form-control" name="button_text" value="{{ $slider->button_text }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Button Link</label>
                                                <input type="link" class="form-control" name="button_link" value="{{ $slider->button_link }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Priority</label>
                                                <input type="number" class="form-control" name="priority" value="{{ $slider->priority }}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
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