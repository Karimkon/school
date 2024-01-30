@extends('layouts.app')
@section('content')
   
   
   <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ number_format($TotalPaidAmount, 2) }} - Shs</h3>
                <p>My Total Paid Tuition Payments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('student/my_fees_collection') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalSubmittedHomework }}</h3>

                <p>Total Submitted Assignments</p>
              </div>
              <div class="icon">
                <i class="far fa-thumbs-up"></i>
              </div>
              <a href="{{ url('student/my_submitted_homework') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalHomework }}</h3>

                <p>Total Assignments</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('student/my_homework') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalNoticeBoard }}</h3>

                <p>Total School Notice Board</p>
              </div>
              <div class="icon">
                <i class="d"></i>
              </div>
              <a href="{{ url('student/my_notice_board') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalSubject }}</h3>

                <p>Total Subjects Offered </p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart"></i>
              </div>
              <a href="{{ url('student/my_subject') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection