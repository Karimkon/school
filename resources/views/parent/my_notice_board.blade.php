@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>MY NOTICE BOARD</h1>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Search Notice</h3>
                </div>
                <form method="get" action="">
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-3">
                      <label>Notice title</label>
                      <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" placeholder="Enter Title">
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label>Notice  date from</label>
                      <input type="date" class="form-control" name="notice_date_from" value="{{ Request::get('notice_date_from') }}">
                    </div>
    
                    <div class="form-group col-md-3">
                      <label>Notice  date to</label>
                      <input type="date" class="form-control" name="notice_date_to" value="{{ Request::get('notice_date_to') }}">
                    </div>
    
                   
                
                    <div class="form-group col-md-3">
                      <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                      <a href="{{ url('parent/my_notice_board') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                    </div>
                    </div>
                  </form> 
                </div>
            </div>
            </div>
          </div>
        </div>
      </section>
  
      @foreach ($getRecord as $value)
      
      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">

      

          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="mailbox-read-info">
                  <h5><b>{{ $value->title }}</b></h5>
                  <h6 style="margin-top: 10px"> {{ date('d-m-Y', strtotime($value->notice_date)) }}</h6>
                </div>
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message">
                 {!! $value->message !!}
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
      
      @endforeach

      <div class="col-md-12">
        <div style="padding: 10px; float:right">
          {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
        </div>
      </div>
    


      
</div>
@endsection