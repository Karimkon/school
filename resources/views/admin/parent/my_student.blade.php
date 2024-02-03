@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><strong>({{ $getParent->name }})children</strong>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search student</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-2">
                        <label>Student ID</label>
                        <input type="text" class="form-control" name="id" value="{{ Request::get('id') }}" placeholder="Enter Student ID">
                      </div>
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

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                    <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                  </div>
                </div>
              </form>
            </div>      

      <center> <p>Students </p></center>     
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
            @include('_message')
@if (!empty($getSearchStudent))
    

          </div>
          <!-- /.col -->
          
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Student ID </th>
                      <th>Profile Pic</th>
                      <th>Student Name</th>
                      <th>Email</th>
                      <th>Parent's Name</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getSearchStudent as $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td>
                        @if(!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; boarder-radius: 50px;">
                        @endif
                      </td>
                      <td>{{ $value->name }} {{ $value->last_name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->parent_name }}</td>
                      <td>{{ $value->created_at }}</td>
                      
                      <td style="min-width: 150px">
                        <a href="{{ url('admin/parent/assign_student_parent/'.$value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm">Add Student to Parent</a>
                      </td>
                    </tr>
                      
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">

              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        
@endif



          <center> <p><p>Parents children</p></p></center> 
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                    
              </div>
              <!-- /.col -->
              
                <div class="card">
                  
                  <!-- /.card-header -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Student ID </th>
                        <th>Profile Pic</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Parent's Name</th>
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
                        <td>{{ $value->parent_name }}</td>
                        <td>{{ $value->created_at }}</td>
                        
                        <td style="min-width: 150px">
                          <a href="{{ url('admin/parent/assign_student_parent_delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                      @endforeach
    
                    </tbody>
                  </table>
          
                    <div style="padding: 10px; float:right">
    
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