@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Author</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $getRecord->first_name) }}" required placeholder="Enter Sur Name">
                            <div style="color: red">{{ $errors->first('first_name') }}</div>
                          </div>

                          <div class="form-group col-md-6">
                            <label>Last Name<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}" required placeholder="Enter Author's last name">
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Author's Picture<span style="color: red;"></span></label>
                          <input type="file" class="form-control" name="author_pic">
                          @if (!empty($getRecord->getProfileDirect()))
                          <img src="{{ $getRecord->getProfileDirect() }}" style="width: 100px; height: 50px;">
                          @endif
                       </div>

                        <div class="form-group col-md-6">
                            <label>DOB<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" required placeholder="Enter Author's last DOB">
                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Date of death<span style="color: red;"></span></label>
                          <input type="date" class="form-control" name="date_of_death" value="{{ old('date_of_death', $getRecord->date_of_death) }}"  placeholder="Enter date of death">
                          <div style="color: red">{{ $errors->first('date_of_death') }}</div>
                      </div>

                        <div class="form-group col-md-6">
                            <label>Nationality<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="nationality" value="{{ old('nationality', $getRecord->nationality) }}">
                            <div style="color: red">{{ $errors->first('nationality') }}</div>
                        </div>

                        

                        <div class="form-group col-md-6">
                            <label>Biography<span style="color: red;"></span></label>
                            <textarea type="text" class="form-control" name="biography" placeholder="Enter biography">{{ $getRecord->biography }}</textarea>
                            <div style="color: red">{{ $errors->first('biography') }}</div>
                        </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection