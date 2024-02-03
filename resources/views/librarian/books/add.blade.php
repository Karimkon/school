@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Book</h1>
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
                            <label>Book Title<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required placeholder="Enter Sur Name">
                            <div style="color: red">{{ $errors->first('title') }}</div>
                          </div>

                          <div class="form-group col-md-6">
                            <label>ISBN Number<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" required placeholder="Enter isbn's Number">
                            <div style="color: red">{{ $errors->first('isbn') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Author<span style="color: red;">*</span></label>
                            <select class="form-control" required name="author_id">
                                <option value="">Select Author</option>
                                @foreach ($getRecord as $value1)
                                  <option value="{{ $value1->id }}">{{ $value1->first_name }} {{ $value1->last_name }}</option>
                                @endforeach
                            </select>
                            <div style="color: red">{{ $errors->first('author_id') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Publisher<span style="color: red;"></span></label>
                          <input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" required placeholder="Enter publisher's Name">
                          <div style="color: red">{{ $errors->first('publisher') }}</div>
                      </div>

                        <div class="form-group col-md-6">
                            <label>Publish date<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date') }}">
                        </div>

                        

                        <div class="form-group col-md-6">
                            <label>Genre (category of the book (e.g., fiction, non-fiction, mystery).)<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="genre" value="{{ old('genre') }}"  placeholder="Enter genre">
                            <div style="color: red">{{ $errors->first('genre') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Description<span style="color: red;"></span></label>
                            <textarea type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Enter Book Description"></textarea>
                            <div style="color: red">{{ $errors->first('description') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Book language<span style="color: red;"></span></label>
                          <input type="text" class="form-control" name="language" value="{{ old('language') }}" required placeholder="Enter Book Language">
                          <div style="color: red">{{ $errors->first('language') }}</div>
                      </div>

                        <div class="form-group col-md-6">
                            <label>Book's Picture<span style="color: red;"></span></label>
                            <input type="file" class="form-control" name="book_pic">
                            <div style="color: red">{{ $errors->first('book_pic') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Total pages<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="total_pages" value="{{ old('total_pages') }}" required placeholder="Enter  total pages">
                            <div style="color: red">{{ $errors->first('total_pages') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Quantity in stock<span style="color: red;"></span></label>
                            <input type="text" class="form-control" name="quantity_in_stock" value="{{ old('quantity_in_stock') }}" required placeholder="Enter Quantity In Stock">
                            <div style="color: red">{{ $errors->first('quantity_in_stock') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                          <label>Book price<span style="color: red;"></span></label>
                          <input type="text" class="form-control" name="price" value="{{ old('price') }}" required placeholder="Enter price">
                          <div style="color: red">{{ $errors->first('price') }}</div>
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