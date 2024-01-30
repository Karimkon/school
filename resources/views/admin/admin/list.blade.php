@extends('layouts.app')
@section('content')
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Portal Total: ({{ $getRecord->total() }})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add New Admin</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- General form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Admin</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Enter Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email address</label>
                            <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                            <a href="{{ url('admin/admin/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('_message')
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->email }}</td>
                      <td>{{ $value->created_at }}</td>
                      <td>
                        <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
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