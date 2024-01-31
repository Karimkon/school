@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parents Total : ( {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add New Parent</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Parents</h3>
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
                    <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Enter Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Occupation</label>
                    <input type="text" class="form-control" name="occupation" value="{{ Request::get('occupation') }}" placeholder="Enter Mobile Number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Enter Mobile Number">
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
                    <a href="{{ url('admin/student/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
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
          <div class="col-md-12">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Parents List</h3>

                <form style="float: right;" action="{{ url('admin/parent/parents_excel_export') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{ Request::get('name') }}" name="name">
                  <input type="hidden" value="{{ Request::get('last_name') }}" name="last_name">
                  <input type="hidden" value="{{ Request::get('email') }}" name="email">
                  <input type="hidden" value="{{ Request::get('address') }}" name="address">      
                  <input type="hidden" value="{{ Request::get('gender') }}" name="gender">      
                  <input type="hidden" value="{{ Request::get('date_of_birth') }}" name="date_of_birth">      
                  <input type="hidden" value="{{ Request::get('mobile_number') }}" name="mobile_number">      
                  <input type="hidden" value="{{ Request::get('occupation') }}" name="occupation">      
                  <input type="hidden" value="{{ Request::get('created_at') }}" name="created_at">      
                  <input type="hidden" value="{{ Request::get('status') }}" name="status">      

                  <button type="submit" class="btn btn-primary">Export as Excel</button>
                </form>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone Number</th>
                      <th>Occupation</th>
                      <th>Address</th>
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
                        @if(!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; boarder-radius: 50px;">
                        @endif
                      </td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->gender }}</td>
                      <td>{{ $value->mobile_number }}</td>
                      <td>{{ $value->occupation }}</td>
                      <td>{{ $value->address }}</td>
                      <td>{{ ($value->status == 0) ? 'Active': 'Inactive'}}</td>
                      <td>{{ $value->created_at }}</td>
                      <td class="row" style="min-width: 150px">
                        <a href="{{ url('admin/parent/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/parent/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ url('admin/parent/my-student/'.$value->id) }}" class="btn btn-primary">Parent's Attached students</a>
                        <a href="{{ url('chat?receiver_id='.base64_encode($value->id)) }}" class="btn btn-success">Send Message</a>
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