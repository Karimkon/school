@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>STUDENT'S ATTENDANCE REPORT</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SEARCH STUDENT'S ATTENDANCE REPORT</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                    

                    <div class="form-group col-md-1">
                        <label>Student ID</label>
                       <input type="text" class="form-control" value="{{ Request::get('student_id') }}" name="student_id" placeholder="Student ID">
                    </div>
                    

                    <div class="form-group col-md-2">
                        <label>Student Name</label>
                       <input type="text" class="form-control" value="{{ Request::get('student_name') }}" name="student_name" placeholder="Enter Student's Name">
                    </div>

                    
                    <div class="form-group col-md-2">
                        <label>Student's Last Name</label>
                       <input type="text" class="form-control" value="{{ Request::get('student_last_name') }}" name="student_last_name" placeholder="Enter Student's Last Name">
                    </div>

                  <div class="form-group col-md-2">
                      <label>Class Name</label>
                      <select class="form-control" name="class_id">
                        <option value="">select</option>
                        @foreach ($getClass as $class)
                          <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                      </select>
                    </div>


                    <div class="form-group col-md-2">
                        <label>Attendance Date</label>
                       <input type="date" class="form-control" value="{{ Request::get('attendance_date') }}" name="attendance_date">
                    </div>


                    <div class="form-group col-md-2">
                        <label>Attendance Type</label>
                        <select name="attendance_type" class="form-control">
                            <option value="">Select</option>
                            <option {{ (Request::get('attendance_type') == 1) ? 'selected' : '' }} value="1">Present</option>
                            <option {{ (Request::get('attendance_type') == 2) ? 'selected' : '' }} value="2">Late</option>
                            <option {{ (Request::get('attendance_type') == 3) ? 'selected' : '' }} value="3">Absent</option>
                            <option {{ (Request::get('attendance_type') == 4) ? 'selected' : '' }} value="4">Half Day</option>

                        </select>
                    </div>
                
                  <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                    <a href="{{ url('admin/attendance/report') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                  </div>
                  </div>
                 
              </div>
              </form>
            </div>     
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Attendance List</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class Name</th>
                                <th>Attendance</th>
                                <th>Attended date (DD/MM/YYYY)</th>
                                <th>Created By</th>
                                <th>Created Date</th>

                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($getRecord as $value)
                               <tr>
                                <td>{{ $value->student_id }}</td>
                                <td>{{ $value->student_name }} {{ $value->student_last_name }}</td>
                                <td>{{ $value->class_name }}</td>
                                <td>
                                @if ($value->attendance_type  == 1)
                                Present
                                @elseif ($value->attendance_type  == 2)
                                Late
                                @elseif ($value->attendance_type  == 3)
                                Absent
                                @elseif ($value->attendance_type  == 4)
                                Half Day 
                                @endif    
                                </td>
                                <td>{{ date('d-m-Y', strtotime($value->attendance_date)) }}</td>
                                <td>{{ $value->created_name }}</td>
                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>

                               </tr>
                           @empty
                               <tr>
                                <td colspan="100%">
                                    Record Not Found !
                                </td>
                               </tr>
                           @endforelse
                        </tbody>
                    </table>
                    <div style="padding: 10px; float:right">
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
    </section>
    </section>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection