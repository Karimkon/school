@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Authors List : ( {{ $getRecord->total() }} )</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('librarian/authors/add') }}" class="btn btn-primary">Add Authors</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search Author</h3>
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
                  <a href="{{ url('librarian/authors/list') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
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

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 table-responsive" style="overflow: auto;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Author's Pic</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>DOB</th>
                      <th>Date of death</th>
                      <th>Nationality</th>
                      <th>Biography</th>
                      <th>Created By</th>
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
                      <td>{{ $value->first_name }}</td>
                      <td>{{ $value->last_name }}</td>
                      <td>
                        @if (!empty($value->date_of_birth))
                        {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                        @endif
                        
                      </td>
                      <td>
                        @if (!empty($value->date_of_death))
                        {{ date('d-m-Y', strtotime($value->date_of_death)) }}
                        @endif
                        
                      </td>
                      <td>{{ $value->nationality }}</td>
                      <td>{{ $value->biography }}</td>
                      <td>{{ $value->created_name }}</td>
                      <td>{{ $value->created_at }}</td>
                      <td style="min-width: 270px;">
                        <a href="{{ url('librarian/authors/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('librarian/authors/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want tto delete this author ?')" class="btn btn-danger btn-sm">Delete</a>
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