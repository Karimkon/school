@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>STUDENT'S ATTENDANCE MANAGEMENT</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SEARCH STUDENT'S ATTENDANCE</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                      <label>Class Name</label>
                      <select class="form-control" name="class_id" id="getClass" required>
                        <option value="">select</option>
                        @foreach ($getClass as $class)
           <option {{ (Request::get('class_id') == $class->class_id) ? 'selected' : '' }} value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                      @endforeach
                      </select>
                    </div>


                    <div class="form-group col-md-3">
                        <label>Attendance Date</label>
                       <input type="date" class="form-control" id="getAttendanceDate" value="{{ Request::get('attendance_date') }}" name="attendance_date" required>
                      </div>


                
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                    <a href="{{ url('teacher/attendance/student') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                  </div>
                  </div>
                 
              </div>
              </form>
            </div>     

            @if(!empty(Request::get('class_id')) && !empty(Request::get('attendance_date')))
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student List</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($getStudent) && !empty($getStudent->count()))
                            @foreach ($getStudent as $value)
                                @php
                                    $attendance_type = '';
                                    $getAttendance = $value->getAttendance($value->id, Request::get('class_id'), Request::get('attendance_date'));
                                    if(!empty($getAttendance->attendance_type))
                                    {
                                        $attendance_type = $getAttendance->attendance_type;
                                    }
                                @endphp
                            
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->name }} - {{ $value->last_name }}</td>
                                <td>
                                    <label style="margin-right: 10px;"><input type="radio" {{ ($attendance_type == '1') ? 'checked' : '' }} value="1" id="{{ $value->id }}" name="attendance{{ $value->id }}" class="SaveAttendance">Present</label>
                                    <label style="margin-right: 10px;"><input type="radio" {{ ($attendance_type == '2') ? 'checked' : '' }} value="2" id="{{ $value->id }}" name="attendance{{ $value->id }}" class="SaveAttendance">Late </label>
                                    <label style="margin-right: 10px;"><input type="radio" {{ ($attendance_type == '3') ? 'checked' : '' }} value="3" id="{{ $value->id }}" name="attendance{{ $value->id }}" class="SaveAttendance">Absent</label>
                                    <label style="margin-right: 10px;"><input type="radio" {{ ($attendance_type == '4') ? 'checked' : '' }} value="4" id="{{ $value->id }}" name="attendance{{ $value->id }}" class="SaveAttendance">Half day</label>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
    </section>
    </section>
</div>
@endsection

@section('script')
<script type="text/javascript">
$('.SaveAttendance').change(function(e) {
    var student_id = $(this).attr('id');
    var attendance_type = $(this).val();
    var class_id = $('#getClass').val();
    var attendance_date = $('#getAttendanceDate').val();

$.ajax({
    type: "POST",
    url: "{{ url('teacher/attendance/student/save') }}",
    data : {
        "_token" : "{{ csrf_token() }}",
        student_id : student_id, 
        attendance_type : attendance_type, 
        class_id : class_id,   
        attendance_date : attendance_date, 
    },
    dataType : "json",
    success: function(data){
        alert(data.message);
    }
});
});
</script>
@endsection