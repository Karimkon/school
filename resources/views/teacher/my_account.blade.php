@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit My Account</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            
            
                @include('_message')
    
          </div>  
              <!-- /.c
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Sur Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" placeholder="Enter Sur Name">
                            <div style="color: red">{{ $errors->first('name') }}</div>
                          </div>
                        <div class="form-group col-md-6">
                            <label>Last Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" placeholder="Enter Last Name">
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender<span style="color: red;">*</span></label>
                            <select class="form-control" required name="gender">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Male') ?  'selected' : '' }} value="Male">Male</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Other') ?  'selected' : '' }} value="Other">Other</option>
                            </select>
                            <div style="color: red">{{ $errors->first('gender') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Date Of Birth<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" placeholder="Enter Date Of Birth" required>
                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Religion<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion) }}" required placeholder="Enter Religion">
                            <div style="color: red">{{ $errors->first('religion') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Mobile Number<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}"  placeholder="Enter Mobile Number">
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Marital Status<span style="color: red;"></span></label>
                          <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status', $getRecord->marital_status) }}"   placeholder="Enter Mobile Number">
                          <div style="color: red">{{ $errors->first('marital_status') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Profile Picture<span style="color: red;"></span></label>
                        <input type="file" class="form-control" name="profile_pic">
                        @if (!empty($getRecord->getProfile()))
                        <img src="{{ $getRecord->getProfile() }}" style="width: 100px; height: 50px;">
                          
                        @endif
                    </div>


                        <div class="form-group col-md-6">
                            <label>Current Address<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address', $getRecord->address) }}" required placeholder="Enter Teacher's Address">
                            <div style="color: red">{{ $errors->first('address') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Permanent Address<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address', $getRecord->permanent_address) }}" required placeholder="Enter Permanent Address">
                            <div style="color: red">{{ $errors->first('permanent_address') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Qualifications<span style="color: red;"></span></label>
                          <input type="text" class="form-control" name="qualification" value="{{ old('qualification', $getRecord->qualification) }}" required placeholder="Enter Permanent Address">
                          <div style="color: red">{{ $errors->first('qualification') }}</div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Work Experience<span style="color: red;"></span></label>
                        <input type="text" class="form-control" name="work_experience" value="{{ old('work_experience', $getRecord->work_experience) }}" required placeholder="Enter Permanent Address">
                        <div style="color: red">{{ $errors->first('work_experience') }}</div>
                    </div>

                   
                  <div class="form-group">
                    <label>Email address<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Enter email">
                    <div style="color: red">{{ $errors->first('email') }}</div>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer" style="text-align: right;">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection