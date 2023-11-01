@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teachers List : ( {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/teacher/add') }}" class="btn btn-primary">Add New Teacher</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Teacher</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-3">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Enter Name">
                  </div>
                <div class="form-group col-md-3">
                  <label>Email address</label>
                  <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Enter email">
                </div>

                <div class="form-group col-md-2">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                                  <option value="">Select Sex</option>
                                  <option {{ (Request::get('gender') == 'Male') ?  'selected' : '' }} value="Male">Male</option>
                                  <option {{ (Request::get('gender') == 'Female') ?  'selected' : '' }} value="Female">Female</option>
                                  <option {{ (Request::get('gender') == 'Other') ?  'selected' : '' }} value="Other">Other</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Enter mobile number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Marital Status</label>
                    <input type="text" class="form-control" name="caste" value="{{ Request::get('marital_status') }}" placeholder="Enter Caste">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Current Address</label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Enter Current Address">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Enter Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Religion</label>
                    <input type="text" class="form-control" name="religion" value="{{ Request::get('religion') }}" placeholder="Enter religion">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Date of Joining</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}" placeholder="Enter Admission Date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Created on Date</label>
                    <input type="date" class="form-control" name="created_at" value="{{ Request::get('created_at') }}" placeholder="Enter Created Date">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                                  <option value="">Select Status</option>
                                  <option {{ (Request::get('status') == 100) ?  'selected' : '' }} value="100">Active</option>
                                  <option {{ (Request::get('status') == 1) ?  'selected' : '' }} value="1">Inactive</option>
                    </select>
                  </div>
                <div class="form-group col-md-3">
                  <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                  <a href="{{ url('admin/teacher/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                </div>
                </div>
               
            </div>
            </form>
          </div>      

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
            @include('_message')

          </div>
          <!-- /.col -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Teachers List</h3>
                <form style="float: right;" action="" method="">
                  <button class="btn btn-primary">Export as Excel</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Teacher Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Religion</th>
                      <th>DOB</th>
                      <th>Date Of Joining</th>
                      <th>Mobile Number</th>
                      <th>Marital Status</th>
                      <th>Current Address</th>
                      <th>Permanent Address</th>
                      <th>Qualifications</th>
                      <th>Work Experience</th>
                      <th>Note</th>
                      <th>Status</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        @if(!empty($value->getProfileDirect()))
                            <img src="{{ $value->getProfileDirect() }}" style="height: 50px; width: 50px; boarder-radius: 50px;">
                        @endif
                      </td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->gender }}</td>
                      <td>{{ $value->religion }}</td>
                      <td>
                        @if (!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                        @endif
                        
                      </td>
                      <td>
                        @if (!empty($value->admission_date))
                        {{ date('d-m-Y', strtotime($value->admission_date)) }}
                        @endif
                        
                      </td>
                      <td>{{ $value->mobile_number }}</td>
                      <td>{{ $value->marital_status }}</td>
                      <td>{{ $value->address }}</td>
                      <td>{{ $value->permanent_address }}</td>
                      <td>{{ $value->qualification }}</td>
                      <td>{{ $value->work_experience }}</td>
                      <td>{{ $value->note }}</td>
                      <td>{{ ($value->status == 0) ? 'Active': 'Inactive'}}</td>
                      <td>{{ $value->created_at }}</td>
                      <td style="min-width: 270px;">
                        <a href="{{ url('admin/teacher/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('admin/teacher/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-success btn-sm">Send Message</a>
                      </td>
                    </tr>
                      
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection