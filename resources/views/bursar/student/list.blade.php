@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Student Total: ({{ $getRecord->total() }})</h1>
            </div>
            <div class="col-sm-12 text-right" style="float: left;">
              <a href="{{ url('admin/student/add') }}" class="btn btn-primary" style="margin-top: 10px;">Add New Student</a>
          </div>
        </div>
       
    </div><!-- /.container-fluid -->
    
    </section>

    <!-- Main content -->
    <section class="content">

      
         
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Student</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Last Name</label>
                  <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Enter Last Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Enter email">
                </div>
                <div class="form-group col-md-2">
                  <label>Admission Number</label>
                  <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}" placeholder="Enter Admission Number">
                </div>
                <div class="form-group col-md-2">
                  <label>Roll Number</label>
                  <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}" placeholder="Enter Roll Number">
                </div>
                <div class="form-group col-md-2">
                  <label>Class Name</label>
                  <input type="text" class="form-control" name="class" value="{{ Request::get('class') }}" placeholder="Enter class_name">
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
                  <label>DOB</label>
                  <input type="text" class="form-control" name="date_of_birth" value="{{ Request::get('date_of_birth') }}" placeholder="Enter DOB">
                </div>
                <div class="form-group col-md-2">
                  <label>Student caste</label>
                  <input type="text" class="form-control" name="caste" value="{{ Request::get('caste') }}" placeholder="Enter Caste">
                </div>
                <div class="form-group col-md-2">
                  <label>Religion</label>
                  <input type="text" class="form-control" name="religion" value="{{ Request::get('religion') }}" placeholder="Enter Religion">
                </div>
                <div class="form-group col-md-2">
                  <label>Mobile Number</label>
                  <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Enter Mobile Number">
                </div>
                <div class="form-group col-md-2">
                  <label>Admission Date</label>
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
                  <a href="{{ url('bursar/student/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                </div>
                </div>
               
            </div>
            </form>
          </div>      

            @include('_message')

          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Student List</h3>
                
                <form action="" method="post" style="float: right;">
                  <button class="btn btn-primary">Export Excel</button>
                </form>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile</th>
                      <th>Student Names</th>
                      <th>Parent Names</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>Tribe</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Group</th>
                      <th>Height</th>
                      <th>Weight</th>
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
                      <td>{{ $value->parent_name }} {{ $value->parent_last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->admission_number }}</td>
                      <td>{{ $value->roll_number }}</td>
                      <td>{{ $value->class_name }}</td>
                      <td>{{ $value->gender }}</td>
                      <td>
                        @if (!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                        @endif
                        
                      </td>
                      <td>{{ $value->caste }}</td>
                      <td>{{ $value->religion }}</td>
                      <td>{{ $value->mobile_number }}</td>
                      <td>{{ $value->admission_date }}</td>
                      <td>{{ $value->blood_group }}</td>
                      <td>{{ $value->height }}</td>
                      <td>{{ $value->weight }}</td>
                      <td>{{ ($value->status == 0) ? 'Active': 'Inactive'}}</td>
                      <td>{{ $value->created_at }}</td>
                      <td style="min-width: 270px">
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
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection