@extends('layouts.app')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Division
        </div>
        <div class="card-body">
          <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('layouts.partial.msg')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Name">
            </div>

            <div class="form-group">
              <label for="priority">priority</label>
              <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Division priority">
            </div>

            <button type="submit" class="btn btn-primary">Add Division</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
