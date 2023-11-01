<!-- my_student.blade.php -->
@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="card">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <center><p>Parents' Children</p></center>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <!-- /.col -->
                                <div class="card-body p-0">
                                    <!-- /.card-header -->
                                    <table class="table table-striped" style="overflow:auto;">
                                        <thead>
                                            <tr>
                                              <th>Profile</th>
                                              <th>Student Names</th>
                                              <th>Email</th>
                                              <th>Admission Number</th>
                                              <th>Roll Number</th>
                                              <th>Class</th>
                                              <th>Gender</th>
                                              <th>DOB</th>
                                              <th>Caste</th>
                                              <th>Religion</th>
                                              <th>Mobile Number</th>
                                              <th>Admission Date</th>
                                              <th>Blood Group</th>
                                              <th>Height</th>
                                              <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($getRecord as $value)
                                            <tr>
                                                <td>
                                                  @if(!empty($value->getProfile()))
                                                      <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; boarder-radius: 50px;">
                                                  @endif
                                                </td>
                                                <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->admission_number }}</td>
                                                <td>{{ $value->roll_number }}</td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->gender }}</td>
                                                <td>
                                                  @if (!empty($value->date_of_birth))
                                                  {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                                                  @endif
                                                  
                                                </td>
                                                <td>{{ $value->caste }}</td>
                                                <td>{{ $value->religion }}</td>
                                                <td>{{ $value->mobile_number }}</td>
                                                <td>{{ $value->admission_date }}</td>
                                                <td>{{ $value->blood_group }}</td>
                                                <td>{{ $value->height }}</td>
                                                <td>{{ $value->weight }}</td>
                                                <td style="min-width: 400px;">

                                                    <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/subject/'.$value->id) }}"> subjects Offered</a>
                                                    <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/exam_result/'.$value->id) }}"> Exam Results</a>
                                                    <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/fees_collection/'.$value->id) }}"> Pay Student's Fees</a>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px; float:right">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
    </section>

@endsection
