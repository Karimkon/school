@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><strong>({{ $getParent->name }})'s children</strong>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      

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

      </div>
    </center>
    </section>
    <!-- /.content -->
  </div>
@endsection