@extends('layouts.app')

@section('title','Profile')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.msg')
                    <div class="main-panel">
                        <div class="content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <h4 class="card-title">Edit Profile</h4>
                                                <p class="card-category">Complete your profile</p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('user.update',$users->id) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Email address</label>
                                                                <input id="email" type="email" class="form-control" value="{{ $users->email }}" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Full Name</label>
                                                                <input id="name" type="text" class="form-control" value="{{ $users->name }}" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label class="control-label">Profile Pic</label><br>
                                                            <input type="file" name="image"><br>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Designation</label>
                                                                <input type="text" class="form-control" value="{{ $users->designation }}" name="designation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone Number</label>
                                                                <input type="text" id="phone" class="form-control" value="{{ $users->phone }}" name="phone">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Address</label>
                                                                <textarea type="text" id="address" class="form-control"  name="address">{{ $users->address }}</textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Password</label>
                                                                <input id="password" type="password" class="form-control" value="{{$users->password}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Update Profile
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-profile">
                                            <div class="card-avatar">
                                                <a href="#pablo">
                                                    <img class="img" src=" {!! asset('uploads/user/'.$users->image) !!}" />
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="card-category text-red">{{ $users->designation }}</h6>
                                                <h4 class="card-title">{{ $users->name }}</h4>
                                                <h4 class="card-title">{{ $users->email }}</h4>
                                                <p class="card-description">
                                                    {{ $users->address }}
                                                </p>
                                                <a href="{{route('admin.dashboard')}}" class="btn btn-primary btn-round">Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')

@endpush