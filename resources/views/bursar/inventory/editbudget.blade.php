@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit New Year School Budget</h1>
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
                            <label>Budget Category<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="category"  value="{{ old('category', $getRecord->category) }}" required placeholder="Enter Budget Category">
                            <div style="color: red">{{ $errors->first('name') }}</div>
                          </div>

                          <div class="form-group col-md-6">
                            <label>Total Estimated Amount</label>
                            <input type="text"  value="{{ old('amount', $getRecord->amount) }}" class="form-control" name="amount">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Year</label>
                            <input type="text"  value="{{ old('year', $getRecord->year) }}" class="form-control" name="year">
                        </div>
    
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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