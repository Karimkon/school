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
                <div class="col-lg-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ number_format($getTotalFees, 2) }} UGX</h3>
                            <p>All Total Received Payments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('admin/fees_collection/collect_fees_report') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ number_format($getTotalTodayFees, 2) }} UGX</h3>
                <p>Today's Total Recieved Payments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('admin/fees_collection/collect_fees_report?start_created_date='.date('Y-m-d').'&end_created_date='.date('Y-m-d'). '') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalAdmin }}</h3>

                <p>Total Academia Administrators</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/admin/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalTeacher }}</h3>

                <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/teacher/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalStudent }}</h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/student/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalParent }}</h3>

                <p>Total Parents</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('admin/parent/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalSubject }}</h3>

                <p>Total Subjects  </p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart"></i>
              </div>
              <a href="{{ url('admin/subject/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalClass }}</h3>

                <p>Total Classes </p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart"></i>
              </div>
              <a href="{{ url('admin/class/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $TotalExam }}</h3>

                <p>Total Exams </p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-chart"></i>
              </div>
              <a href="{{ url('admin/examinations/exam/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection