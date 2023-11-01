@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>MARK REGISTERS</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SEARCH MARK REGISTERS</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-md-3">
                    <label>Exam Name</label>
                    <select class="form-control" name="exam_id" required>
                      <option value="">select</option>
                      @foreach ($getExam as $exam)
                      <option {{ (Request::get('exam_id') == $exam->id) ? 'selected' : '' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                      @endforeach
                      
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label>Class Name</label>
                      <select class="form-control" name="class_id" required>
                        <option value="">select</option>
                        @foreach ($getClass as $class)
                          <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                      </select>
                    </div>
                
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                    <a href="{{ url('admin/examinations/marks_register') }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                  </div>
                  </div>
                 
              </div>
              </form>
            </div>      
  
        @include('_message')
        @if (!empty($getSubject) && !empty($getSubject->count()))
        <div class="card">
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>STUDENT NAME</th>
                            @foreach ($getSubject as $subject)
                            <th>
                                {{ $subject->subject_name }} <br />
                                ({{ $subject->subject_type }} : {{ $subject->passing_mark }}/{{ $subject->full_marks }})
                            </th>
                            @endforeach
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($getStudent) && !empty($getStudent->count()))
                        @foreach ($getStudent as $student)
                        <form name="post" class="SubmitForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                            <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                        <tr>
                            <td>{{ $student->name }} - {{ $student->last_name }}</td>
                            @php 
                                $i = 1;
                                $totalStudentMark = 0;
                                $totalFullMarks = 0;
                                $totalPassingMarks = 0;
                                $pass_fail_vali = 0;
                            @endphp
                            @foreach ($getSubject as $subject)

                            @php 
                            $totalMark = 0; 
                            $totalFullMarks = $totalFullMarks+$subject->full_marks;
                            $totalPassingMarks = $totalPassingMarks+$subject->passing_mark;
                            $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'),
                            $subject->subject_id);
                            if(!empty($getMark))
                            {
                                $totalMark = $getMark->class_work+$getMark->home_work+$getMark->test_work+$getMark->exam;
                            }
                            $totalStudentMark = $totalStudentMark + $totalMark;

                            @endphp

                            <td>
                                <div style="margin-bottom: 10px">
                                    Class Work Marks
                                    <input type="hidden" name="mark[{{ $i }}][full_marks]" value="{{ $subject->full_marks }}">
                                    <input type="hidden" name="mark[{{ $i }}][passing_mark]" value="{{ $subject->passing_mark }}">

                                    <input type="hidden" name="mark[{{ $i }}][id]" value="{{ $subject->id }}">
                                    <input type="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                    <input type="text" name="mark[{{ $i }}][class_work]" id="class_work_{{ $student->id }}{{ $subject->subject_id }}" style='width: 100%;' class="form-control"
                                    value="{{ !empty($getMark->class_work) ? $getMark->class_work : '' }}" placeholder="Enter Marks Obtained">
                                </div>
                                <div style="margin-bottom: 10px">
                                    Home Work Marks
                                    <input type="text"name="mark[{{ $i }}][home_work]" id="home_work_{{ $student->id }}{{ $subject->subject_id }}" style='width: 100%;' class="form-control"
                                    value="{{ !empty($getMark->home_work) ? $getMark->home_work : '' }}" placeholder="Enter Marks Obtained">
                                </div>
                                <div style="margin-bottom: 10px">
                                    Tests Marks
                                    <input type="text"name="mark[{{ $i }}][test_work]" id="test_work_{{ $student->id }}{{ $subject->subject_id }}" style='width: 100%;' class="form-control"
                                    value="{{ !empty($getMark->test_work) ? $getMark->test_work : '' }}" placeholder="Enter Marks Obtained">
                                </div>
                                <div style="margin-bottom: 10px">
                                    Exam Marks
                                    <input type="text"name="mark[{{ $i }}][exam]" id="exam_{{ $student->id }}{{ $subject->subject_id }}" style='width: 100%;' class="form-control"
                                    value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}" placeholder="Enter Marks Obtained">
                                </div>
            <div style="margin-bottom: 10px">
                <button type="button" class="btn btn-primary SaveSingleSubject" id="{{ $student->id }}" 
                data-val='{{ $subject->subject_id }}' data-schedule="{{ $subject->id }}" data-exam="{{ Request::get('exam_id') }}" data-class="{{ Request::get('class_id') }}">SAVE</button>
            </div>
            @if(!empty($getMark))
            <div style="margin-bottom: 10px">
             <b>Total Marks : </b>  {{ $totalMark }} <br />
             <b>Passing Mark : </b>  {{ $subject->passing_mark }} <br />

             @php
                $getLoopGrade = App\Models\MarksGradeModel::getGrade($totalMark);
             @endphp

             @if (!empty($getLoopGrade))
             <b>Subject Grade : </b>  {{ $getLoopGrade }} <br />
             @endif

             @if ($totalMark >= $subject->passing_mark)
             Result : <span style="color:green;font-weight: bold;">Pass</span>
             @else
             Result : <span style="color:red; font-weight: bold;">Fail</span>
             @php
                 $pass_fail_vali = 1;
             @endphp
             @endif
            </div>
            @endif
                </td>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            <td style="min-width: 300px">
                                <button type="submit" class="btn btn-success">Save</button>
                                
                        <a class="btn btn-primary" target="_blank" 

                        href="{{ url('admin/my_exam_result/print?exam_id='.Request::get('exam_id').'&student_id='.$student->id) }}">
                        Print</a>   

                                @if(!empty($totalStudentMark))
                                <br />
                                <br />
                                <br />
                                <b>Total Student Mark </b>{{ $totalStudentMark }}
                                <br />
                                <b>Total Subjects Mark </b>{{ $totalFullMarks }}
                                <br />
                                <b>Total Passing Mark </b>{{ $totalPassingMarks }}
                                <br />
                                @php
                                    $percentage = ($totalStudentMark * 100) / $totalFullMarks;
                                    $getGrade = App\Models\MarksGradeModel::getGrade($percentage);
                                @endphp     
                                <br>
                                <b>Percentage : </b>{{ round($percentage,2) }}%   <br>  

                                @if (!empty($getGrade))
                                <b>Grade : </b>{{ $getGrade }}  <br>  

                                @endif

                                @if ($pass_fail_vali == 0)
                                {
                                 Result :   <span style="color:green;font-weight: bold;">Pass</span>
                                }
                                @else
                                {
                                Result : <span style="color:red; font-weight: bold;">Fail</span>
                                }
                                    
                                @endif
                                @endif
                            </td>
                            
                        </tr>
                        </form>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </section>
</div>
@endsection

@section('script')
 <script type="text/javascript">
    $('.SubmitForm').submit(function(e) {
        e.preventDefault();
        console.log('Form submitted');
        $.ajax({
            type: "POST",
            url: "{{ url('admin/examinations/submit_marks_register') }}",
            data: $(this).serialize(),
            dataType : "json",
            success: function(data){
               alert(data.message);
            }
        });

    })

    $('.SaveSingleSubject').click(function(e) {
        var student_id = $(this).attr('id');
        var subject_id = $(this).attr('data-val');   
        var exam_id = $(this).attr('data-exam');   
        var class_id = $(this).attr('data-class');  
        var id = $(this).attr('data-schedule');     
        var class_work = $('#class_work_'+student_id+subject_id).val();
        var home_work = $('#home_work_'+student_id+subject_id).val();
        var test_work = $('#test_work_'+student_id+subject_id).val();
        var exam = $('#exam_'+student_id+subject_id).val();
    
    $.ajax({
        type: "POST",
        url: "{{ url('admin/examinations/single_submit_marks_register') }}",
        data : {
            "_token" : "{{ csrf_token() }}",
            id : id,
            student_id : student_id,
            subject_id : subject_id,
            exam_id : exam_id,
            class_id : class_id,
            class_work : class_work,
            home_work : home_work,
            test_work : test_work,
            exam : exam
        },
        dataType : "json",
        success: function(data){
            alert(data.message);
        }
    });
});
</script>
@endsection