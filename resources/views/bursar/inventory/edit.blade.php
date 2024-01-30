@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit School Inventory Items</h1>
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
                            <label>Item<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name"  value="{{ old('name', $getRecord->name) }}" required placeholder="Enter Item">
                            <div style="color: red">{{ $errors->first('name') }}</div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="description">Update Image</label>
                            <input type="file" class="form-control" name="item_image">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ old('description', $getRecord->description) }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" value="{{ old('quantity', $getRecord->quantity) }}" name="quantity" min="1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_price">Unit Price</label>
                            <input type="number" class="form-control" name="unit_price" value="{{ old('unit_price', $getRecord->unit_price) }}" step="0.01" min="0" required>
                        </div>
                    
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modify</button>
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