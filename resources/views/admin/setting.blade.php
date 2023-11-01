@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SYSTEM SETTINGS</h1>
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
                  <div class="form-group">
                    <label>Paypal Business Email</label>
                    <input type="email" class="form-control" value="{{ $getRecord->paypal_email }}" name="paypal_email" required placeholder="Enter Paypal Business Email">
                  </div>
                  <div class="form-group">
                    <label>Stripe key</label>
                    <input type="text" class="form-control" value="{{ $getRecord->stripe_key }}" name="stripe_key">
                  </div>

                  <div class="form-group">
                    <label>Stripe Secret</label>
                    <input type="text" class="form-control" value="{{ $getRecord->stripe_secret }}" name="stripe_secret">
                  </div>
                 
                  <div class="form-group">
                    <label> School Logo <span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="logo">
                    @if (!empty($getRecord->getLogo()))
                    <img src="{{ $getRecord->getLogo() }}" style="width: 100px; height: 50px;">
                      
                    @endif
                </div>

                <div class="form-group">
                  <label> Favicon Icon <span style="color: red;"></span></label>
                  <input type="file" class="form-control" name="fevicon_icon">
                  @if (!empty($getRecord->getFevicon()))
                  <img src="{{ $getRecord->getFevicon() }}" style="width: 100px; height: 50px;">
                    
                  @endif
              </div>

              <div class="form-group">
                <label>School Name</label>
                <input type="text" class="form-control" value="{{ $getRecord->school_name }}" name="school_name" placeholder="Enter School Name">
              </div>

              <div class="form-group">
                <label>Exam Description</label>
                <textarea class="form-control" name="exam_description">{{ $getRecord->exam_description }}</textarea>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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