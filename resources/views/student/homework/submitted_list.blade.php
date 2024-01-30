@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>SUBMITTED WORK ASSIGNMENTS</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- General form elements -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Search My Submitted assignments</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Class Subject Name</label>
                                        <input type="text" class="form-control" name="subject_name"
                                            value="{{ Request::get('subject_name') }}" placeholder="Enter Subject name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Homework Date : From</label>
                                        <input type="date" class="form-control" name="from_homework_date"
                                            value="{{ Request::get('homework_date') }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Homework Date : To</label>
                                        <input type="date" class="form-control" name="to_homework_date"
                                            value="{{ Request::get('to_homework_date') }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 10px">Search</button>
                                        <a href="{{ url('student/my_submitted_homework') }}" style="margin-top: 10px"
                                            class="btn btn-success">Reset</a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    @include('_message')

                </div>
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Submitted Assignments Table</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Serial Number</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Homework Date</th>
                                            <th>Submission Date</th>
                                            <th>Document</th>
                                            <th>Description</th>
                                            <th>Created Date</th>

                                            <th>Submitted Document</th>
                                            <th>Submitted Description</th>
                                            <th>Submitted Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->class_name }}</td>
                                                <td>{{ $value->subject_name }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->getHomework->homework_date)) }}</td>
                                                <td>{{ date('d-m-Y', strtotime($value->getHomework->submission_date)) }}</td>
                                                <td>
                                                    @if (!empty($value->getHomework->getDocument()))
                                                        <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary"
                                                            download="">Download</a>
                                                    @endif
                                                </td>
                                                <td>{!! $value->getHomework->description !!}</td>
                                                <td>{{ $value->getHomework->created_at }}</td>

                                                <td>
                                                    @if (!empty($value->getDocument()))
                                                        <a href="{{ $value->getDocument() }}" class="btn btn-primary" download="">Download</a>
                                                    @endif
                                                </td>
                                                <td>{!! $value->description !!}</td>
                                                <td>{{ $value->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">Record Not Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div style="padding: 10px; float:right">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
