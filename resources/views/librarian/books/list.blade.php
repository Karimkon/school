@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Books List : ( {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('librarian/books/add') }}" class="btn btn-primary">Add Books</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Book</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                <div class="form-group col-md-3">
                  <label>Book Title</label>
                  <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-3">
                    <label>Author's Name</label>
                    <input type="text" class="form-control" name="author_id" value="{{ Request::get('author_id') }}" placeholder="Enter Name">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Genre</label>
                    <input type="text" class="form-control" name="genre" value="{{ Request::get('genre') }}" placeholder="Enter mobile number">
                  </div>
                  <div class="form-group col-md-2">
                    <label>language</label>
                    <input type="text" class="form-control" name="language" value="{{ Request::get('marital_status') }}" placeholder="Enter language">
                  </div>
                
                  <div class="form-group col-md-2">
                    <label>Date of Publication</label>
                    <input type="date" class="form-control" name="publish_date" value="{{ Request::get('publish_date') }}" placeholder="Enter Admission Date">
                  </div>
                  
                <div class="form-group col-md-3">
                  <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                  <a href="{{ url('librarian/books/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                </div>
                </div>
               
            </div>
            </form>
          </div>      

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            
            @include('_message')

          </div>
          <!-- /.col -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Books List</h3>
                <form style="float: right;" action="" method="">
                  <button class="btn btn-primary">Export as Excel</button>
                </form>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Book Pic</th>
                      <th>Book Title</th>
                      <th>Author</th>
                      <th>ISBN</th>
                      <th>Publisher</th>
                      <th>Publish date</th>
                      <th>Genre</th>
                      <th>language</th>
                      <th>Total pages</th>
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
                      <td>{{ $value->title }}</td>
                      <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                      <td>{{ $value->isbn }}</td>
                      <td>{{ $value->publisher }}</td>
                      <td>
                        @if (!empty($value->publish_date))
                        {{ date('d-m-Y', strtotime($value->publish_date)) }}
                        @endif
                        
                      </td>
                      <td>{{ $value->genre }}</td>
                      <td>{{ $value->language }}</td>
                      <td>{{ $value->total_pages }}</td>
                      <td>{{ $value->created_at }}</td>
                      <td style="min-width: 270px;">
                        <a href="{{ url('librarian/books/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('librarian/books/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
        

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection