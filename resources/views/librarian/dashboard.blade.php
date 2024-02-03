@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">E-Liblary</h1>
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
                            <h3>{{ $TotalBooks }} UGX</h3>
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
                <h3>{{ $TotalBooks }} UGX</h3>
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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
                <h3>{{ $TotalBooks }}</h3>

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
<!-- 
  Borrowings Table:

id
user_id (foreign key referencing users table)
book_id (foreign key referencing books table)
borrow_date
return_date
returned (boolean to indicate whether the book has been returned)
created_at
updated_at
Authors Table (Already Discussed):

id
first_name
last_name
date_of_birth
date_of_death
nationality
biography
created_at
updated_at
Genres Table:

id
name (e.g., Fiction, Non-Fiction, Mystery, etc.)
created_at
updated_at
Publishers Table:

id
name
address
contact_information
created_at
updated_at
Book-Genres Relationship Table (Pivot Table):

book_id (foreign key referencing books table)
genre_id (foreign key referencing genres table)
Book-Author Relationship Table (Pivot Table):

book_id (foreign key referencing books table)
author_id (foreign key referencing authors tabl
-->
@endsection