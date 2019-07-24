@extends('layouts.app')

@section('title','Student Details')

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
                                                <h4 class="card-title">Edit Details</h4>

                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('student.update',$students->id) }} " enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Name</label>
                                                                <input id="name" type="text" class="form-control" value="{{ $students->name }}" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Phone</label>
                                                                <input id="phone" type="text" class="form-control" value="{{ $students->phone }}" name="phone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input id="email" type="text" class="form-control" value="{{ $students->email }}" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Date of Birth</label>
                                                                <input type="date" class="form-control" value="{{ $students->dob }}" name="dob">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender</label>
                                                                <input id="gender" type="text" class="form-control" value="{{ $students->gender }}" name="gender">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Blood Group</label>
                                                                <input id="blood" type="text" class="form-control" value="{{ $students->blood }}" name="blood">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Nationality</label>
                                                                <input id="nationality" type="text" class="form-control" value="{{ $students->nationality }}" name="nationality">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Father's Name</label>
                                                                <input id="f_name" type="text" class="form-control" value="{{ $students->f_name }}" name="f_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Father's Phone</label>
                                                                <input id="f_phone" type="text" class="form-control" value="{{ $students->f_phone }}" name="f_phone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Father's Occupation</label>
                                                                <input id="f_occupation" type="text" class="form-control" value="{{ $students->f_occupation }}" name="f_occupation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Mother's Name</label>
                                                                <input id="m_name" type="text" class="form-control" value="{{ $students->m_name }}" name="m_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Mother's Phone</label>
                                                                <input id="m_phone" type="text" class="form-control" value="{{ $students->m_phone }}" name="m_phone">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Mothers's Occupation</label>
                                                                <input id="m_occupation" type="text" class="form-control" value="{{ $students->m_occupation }}" name="m_occupation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Present Address</label>
                                                                <input id="present_address" type="text" class="form-control" value="{{ $students->present_address }}" name="present_address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Permanent Address</label>
                                                                <input id="permanent_address" type="text" class="form-control" value="{{ $students->permanent_address}}" name="permanent_address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>



                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label class="control-label">Photo</label><br>
                                                            <input type="file" name="photo"><br>
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
                                                    <img class="img" src=" {!! asset('uploads/student/'.$students->photo) !!}" />
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="card-category text-red">{{ $students->phone }}</h6>
                                                <h4 class="card-title">{{ $students->email }}</h4>
                                                <p class="card-description">
                                                    {{ $students->address }}
                                                </p>
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