@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HOME WORK</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/homework/studenthomework/add') }}" class="btn btn-primary">Add New Homework</a>
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
              <h3 class="card-title">Search Homework</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2">
                  <label>Class Name</label>
                  <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}" placeholder="Enter Class Name">
                </div>
                <div class="form-group col-md-2">
                  <label>Class Subject Name</label>
                  <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name') }}" placeholder="Enter Subject name">
                </div>

                <div class="form-group col-md-2">
                    <label>Homework Date : From</label>
                    <input type="date" class="form-control" name="from_homework_date" value="{{ Request::get('homework_date') }}">
                 </div>

                 
                <div class="form-group col-md-2">
                    <label>Homework Date : To</label>
                    <input type="date" class="form-control" name="to_homework_date" value="{{ Request::get('to_homework_date') }}">
                 </div>

                <div class="form-group col-md-3">
                  <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                  <a href="{{ url('admin/homework/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                </div>
                </div>
               
            </div>
            </form>
          </div>      
            
            @include('_message')

          </div>
          <div class="col-md-12">
            
            
                <div class="card-header">
                    <h3 class="card-title">Home Work List</h3>
                </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Homework Date</th>
                      <th>Submission Date</th>
                      <th>Document</th>
                      <th>Description</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->class_name }}</td>
                            <td>{{ $value->subject_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->homework_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->submission_date)) }}</td>
                            <td>
                                @if (!empty($value->getDocument()))
                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                @endif
                            </td>
                            <td>{!! $value->description !!}</td>
                            <td>{{ $value->created_by_name }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/homework/studenthomework/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('admin/homework/studenthomework/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>  
                                <a href="{{ url('admin/homework/studenthomework/submitted/'.$value->id) }}" class="btn btn-success">Submitted Assignments</a>                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">Record Not Found</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection 