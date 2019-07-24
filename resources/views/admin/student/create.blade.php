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
                            <h4 class="card-title ">Add New Student</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Student Name</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <label class="control-label">Student Profile Photo</label><br>
                                                <input type="file" name="photo">
                                            </div>
                                        </div>
                                    </div>
                                     <br>

                                     <div class="container">
                                         <div class="row">
                                             <div class="col-sm">
                                             <div class="form-group label-floating">
                                                 <label class="control-label">Email</label>
                                                 <input type="email" class="form-control" name="email">
                                             </div>
                                         </div>
                                             <div class="col-sm">
                                             <div class="form-group label-floating">
                                                 <label class="control-label">Phone</label>
                                                 <input type="number" class="form-control" name="phone">
                                             </div>
                                     </div>
                                         </div>
                                         <br>

                                         <div class="container">
                                             <div class="row">
                                                 <div class="col-sm">
                                                     <div class="form-group label-floating">
                                                         <label class="control-label">Date of Birth</label>
                                                         <input type="date" class="form-control" name="dob">
                                                     </div>
                                                 </div>
                                                     <div class="col-sm">
                                                         <div class="form-group label-floating">
                                                             <label class="control-label">Nationality</label>
                                                             <input type="text" class="form-control" name="nationality">
                                                         </div>
                                                     </div>
                                                 <div class="col-sm">
                                                     <div class="form-group label-floating">
                                                         <label class="control-label">Gender  : </label>
                                                         <select name="gender">
                                                             <option value=""> Select</option>
                                                             <option value="Male">Male</option>
                                                             <option value="Female">Female</option>
                                                             <option value="Tran_gender">Tran_gender</option>
                                                         </select>
                                                     </div>
                                                 </div>
                                                 <div class="col-sm">
                                                     <div class="form-group label-floating">
                                                         <label class="control-label">Blood Group  : </label>
                                                         <select name="blood">
                                                             <option value="">Blood Select</option>
                                                             <option value="A+">A+</option>
                                                             <option value="A-">A-</option>
                                                             <option value="B+">B+</option>
                                                             <option value="B-">B-</option>
                                                             <option value="O+">O+</option>
                                                             <option value="O-">O-</option>
                                                         </select>
                                                     </div>
                                                 </div>

                                         </div>






<br>

                                    <div class="row">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                    <br>



                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Father's Name</label>
                                                            <input type="text" class="form-control" name="f_name">
                                                        </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Father's Phone</label>
                                                    <input type="text" class="form-control" name="f_phone">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Father's Occupation</label>
                                                    <input type="text" class="form-control" name="f_occupation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mother's Name</label>
                                                            <input type="text" class="form-control" name="m_name">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mother's Phone</label>
                                                            <input type="text" class="form-control" name="m_phone">
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mother's Occupation</label>
                                                            <input type="text" class="form-control" name="m_occupation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Present Address</label>
                                                <input type="text" class="form-control" name="present_address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Permanent Address</label>
                                                <input type="text" class="form-control" name="permanent_address">
                                            </div>
                                        </div>
                                    </div>









                                    <a href="{{ route('faculty.index') }}" class="btn btn-danger">Back</a>
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