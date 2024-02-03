@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="card card-primary">
              <div class="card-body text-center">
                <div class="mb-3">
                  <label for="profile_pic" class="form-label">Profile Picture</label>
                </div>
                @if (!empty($getRecord->getProfile()))
                  <img src="{{ $getRecord->getProfile() }}" class="img-fluid rounded-circle" alt="Profile Picture">
                @endif
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <!-- general form elements -->
            @include('_message')
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Sur Name<span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}" required placeholder="Enter Sur Name">
                      <div style="color: red">{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Last Name<span style="color: red;">*</span></label>
                      <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required placeholder="Enter Last Name">
                      <div style="color: red">{{ $errors->first('last_name') }}</div>
                    </div>


                    <hr />
                    <div class="form-group">
                      <label>Email address<span style="color: red;">*</span></label>
                      <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Enter email">
                      <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
  
                    <!-- Add more fields as needed -->
  
                  </div>
                  <!-- /.card-body -->
  
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  @endsection