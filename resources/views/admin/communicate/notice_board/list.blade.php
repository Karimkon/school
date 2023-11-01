@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>NOTICE BOARD</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/communicate/notice_board/add') }}" class="btn btn-primary">Add New Notice board</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            
            @include('_message')

          </div>
          <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Notice</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-2">
                  <label>Notice title</label>
                  <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" placeholder="Enter Title">
                </div>
                
                <div class="form-group col-md-2">
                  <label>Notice  date from</label>
                  <input type="date" class="form-control" name="notice_date_from" value="{{ Request::get('notice_date_from') }}">
                </div>

                <div class="form-group col-md-2">
                  <label>Notice  date to</label>
                  <input type="date" class="form-control" name="notice_date_to" value="{{ Request::get('notice_date_to') }}">
                </div>

                
                <div class="form-group col-md-2">
                  <label>Publish  date from</label>
                  <input type="date" class="form-control" name="publish_date_from" value="{{ Request::get('publish_date_from') }}">
                </div>

                <div class="form-group col-md-2">
                  <label>Publish  date to</label>
                  <input type="date" class="form-control" name="publish_date_to" value="{{ Request::get('publish_date_to') }}">
                </div> 

                <div class="form-group col-md-2">
                  <label>Recipients</label>
                  <select class="form-control" name="message_to">
                    <option value="">Select</option>  
                  <option {{ (Request::get('message_to') == 3) ? 'selected' : '' }} value="2">Student</option>  
                  <option {{ (Request::get('message_to') == 2) ? 'selected' : '' }} value="5">Parent</option>  
                  <option {{ (Request::get('message_to') == 5) ? 'selected' : '' }} value="3">Teacher</option>  

                  </select>     
                </div>

               
            
                <div class="form-group col-md-3">
                  <button class="btn btn-primary" type="submit" style="margin-top: 10px">Search</button>
                  <a href="{{ url('admin/communicate/notice_board') }}" style="margin-top: 10px" class="btn btn-success">Reset</a>
                </div>
                </div>
              </form> 
            </div>
            
                <div class="card-header">
                    <h3 class="card-title">Notice Board List</h3>
                </div>
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Title of Notice</th>
                      <th>Date of Notice</th>
                      <th>Publication Date</th>
                      <th>Recipient</th>
                      <th>Created By</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ date('d-m-Y', strtotime($value->notice_date)) }}</td>
                        <td>{{ date('d-m-Y', strtotime( $value->publish_date))  }}</td>
                        <td>
                          @foreach ($value->getMessage as $message)
                            @if ($message->message_to == 2)
                              <div>Student</div>
                            @elseif($message->message_to == 3)
                              <div>Teacher</div>
                            @elseif($message->message_to == 5)
                              <div>Parent</div>
                            @endif
                          @endforeach

                        </td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                          <a href="{{ url('admin/communicate/notice_board/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/communicate/notice_board/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="100%">Record Not Found.</td>
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