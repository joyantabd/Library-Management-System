@extends('layouts.app')

@section('title','sliders')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')

                    <a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                        <i class="fa fa-plus"></i> Add New Slider
                    </a>
                    <div class="clearfix"></div>

                    <!-- Add Modal -->
                    <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add new slider</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <form action="{!! route('slider.store') !!}"  method="post" enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="title">Slider Title <small class="text-danger">(required)</small></label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required>
                                        </div>

                                        <div class="">
                                            <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                                            <input type="file" name="image"  required>
                                        </div>

                                        <div class="form-group">
                                            <label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
                                            <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)">
                                        </div>

                                        <div class="form-group">
                                            <label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
                                            <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)">
                                        </div>

                                        <div class="form-group">
                                            <label for="priority">Slider Priority <small class="text-info">(required)</small></label>
                                            <input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" value="10" required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Add New</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>








                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">sliders Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table">
                                    <thead class="text-primary">
                                    <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Button Text</th>
                                    <th>Button Link</th>
                                    <th>Priority</th>
                                    <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td><img src="{!! asset('uploads/sliders/'.$slider->image) !!}" class="img rounded-circle" style="width:100px"></td>
                                            <td>{{ $slider->button_text }}</td>
                                            <td>{{ $slider->button_link }}</td>
                                            <td>{{ $slider->priority }}</td>
                                            <td>
                                                <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $slider->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Button Text</th>
                                    <th>Button Link</th>
                                    <th>Priority</th>
                                    <th>Action</th>

                                    </tfoot>
                                </table>
                            </div>
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
