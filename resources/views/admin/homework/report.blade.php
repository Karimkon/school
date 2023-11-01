@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>SUBMITTED WORK ASSIGNMENTS REPORT</h1>
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
              <h3 class="card-title">Search Submitted assignments Report</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2">
                    <label>Class Name</label>
                    <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}" placeholder="Enter Subject name">
                    </div>

                <div class="form-group col-md-2">
                  <label>Class Subject Name</label>
                  <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name') }}" placeholder="Enter Subject name">
                </div>
                
                <div class="form-group col-md-2">
                    <label>Student's First Name</label>
                    <input type="text" placeholder="Enter Student's First Name" class="form-control" name="first_name" value="{{ Request::get('first_name') }}">
                    </div>
                        
                <div class="form-group col-md-2">
                <label>Student's Last Name</label>
                <input type="text" placeholder="Enter Student's Last Name" class="form-control" name="last_name" value="{{ Request::get('last_name') }}">
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
                  <a href="{{ url('admin/homework/homework_report') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                </div>
                </div>
               
            </div>
            </form>
          </div>      
            
            @include('_message')

          </div>
          <div class="col-md-12">
            
            
                <div class="card-header">
                    <h3 class="card-title">Assignments Reports List</h3>
                </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Student Name</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Homework Date</th>
                      <th>Submission Date</th>
                      <th>Document</th>
                      <th>Description</th>
                      <th>Created Date</th>

                      <th>Submitted Document</th>
                      <th>Submitted Description</th>
                      <th>Submitted Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->subject_name }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->getHomework->homework_date)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->getHomework->submission_date)) }}</td>
                        <td>
                            @if (!empty($value->getHomework->getDocument()))
                                <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary" download="">Download</a>
                            @endif
                        </td>
                        <td>{!! $value->getHomework->description !!}</td>
                        <td>{{ $value->getHomework->created_at }}</td>

                        <td>
                            @if (!empty($value->getDocument()))
                                <a href="{{ $value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                            @endif
                        </td>
                        <td>{!! $value->description !!}</td>
                        <td>{{ $value->created_at }}</td>
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