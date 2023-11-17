@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
         <center>   <h1><b>Your Academic Performance Overview <BR /> FINAL RESULTS</b></h1> </center>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          </div>

          @foreach ($getRecord as $value)
            
          <div class="col-md-12">
            <div class="card">     
              <div class="card-header">
                <h3 class="card-title">{{ $value['exam_name'] }} </h3>

                <a class="btn btn-primary btn-sm" style="float: right;" target="_blank" href="{{ url('student/my_exam_result/print?exam_id='.$value['exam_id'].'&student_id='.Auth::user()->id) }}">Print</a>
              </div> 
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Exams Done</th>
                      <th>Class Work</th>
                      <th>Test Work</th>
                      <th>Home Work</th>
                      <th>Final Exam </th>
                      <th>Total Score </th>
                      <th>Passing Mark </th>
                      <th>Full Mark</th>
                      <th>Result</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                       $total_score = 0;
                       $full_marks = 0;
                       $result_validation = 0;
                    @endphp
                    @foreach ($value['subject'] as $exam)
                    @php
                       $total_score = $total_score + $exam['total_score'];
                       $full_marks = $full_marks + $exam['full_marks'];

                       if ($exam['total_score'] < $exam['passing_mark']) {
            $result_validation = 1; // Set to fail if any subject is failed
                      }
                    @endphp
                    <tr>
                      <td style="width: 300px;">  {{ $exam['subject_name'] }}</td>
                      <td>  {{ $exam['class_work'] }}</td>
                      <td>  {{ $exam['test_work'] }}</td>
                      <td>  {{ $exam['home_work'] }}</td>
                     <td> {{ $exam['exam'] }}</td>
                     <td> {{ $exam['total_score'] }}</td>
                     <td> {{ $exam['passing_mark'] }}</td>
                     <td> {{ $exam['full_marks'] }}</td>

                     <td>
                        @if($exam['total_score']  >= $exam['passing_mark'])
                        <span style="color: green; font-weight: bold;">Pass</span>
                        @else
                        @php
                          $result_validatiom = 1;
                        @endphp
                        <span style="color: red; font-weight: bold;">Fail</span>
                        @endif
                     </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="2"><b>Grand Total : {{ $total_score }}/{{ $full_marks }}</b></td>

                      <td colspan="2">
                        @php
                        $percentage = ($total_score * 100) / $full_marks;
                        $getGrade = App\Models\MarksGradeModel::getGrade($percentage);

                        @endphp
                        <b>Percentage : {{ round(($total_score * 100) / $full_marks, 2) }} %</b></td>

                      <td colspan="2"><b>Grade : {{ $getGrade }}</b></td>

                      <td colspan="3"><b>Result : @if($result_validation == 0) 
                        <span style="color: green">Pass</span>
                          @else 
                          <span style="color: red">Fail</span>
                         @endif</b></td>
                    </tr>
                  </tbody>  
                </table>
              </div>
              </div>
            </div>

            @endforeach
          </div>
        </div>

      </div>
    </section>
  </div>
@endsection