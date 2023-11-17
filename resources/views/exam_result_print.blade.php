<!DOCTYPE html>
<html lang="en">
    @php
    $getHeaderSetting = App\Models\SettingModel::getSingle();
  @endphp
  <link href="{{ $getHeaderSetting->getFevicon() }}" rel="icon" type="image/jpg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Exam Results</title>
    <style type="text/css">
        @page {
            size: A4;
            margin: 20mm; /* Adjust the margin as needed */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #page {
            width: 100%;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
        }

        .school-logo {
            width: 110px;
            height: auto;
            float: right;
        }

        .school-details {
            margin-left: 20px;
        }

        .school-title {
            font-size: 24px;
            font-weight: bold;
        }

        .student-info {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .student-image {
            width: 100px;
            height: 100px;
            border-radius: 6px;
        }

        .student-details {
            margin-left: 20px;
        }

        .gender {
            margin-top: 10px;
        }

        .student-details table {
            width: 100%;
            margin-top: 10px;
        }

        .student-details table td {
            padding: 5px;
            border-bottom: 1px solid #000;
        }

        .table-bg {
            border-collapse: collapse;
            width: 100%;
            font-size: 15px;
        }

        .table-bg th,
        .table-bg td {
            border: 1px solid #000;
            padding: 10px;
        }

        .table-bg .text-container {
            text-align: left;
            padding-left: 5px;
        }

        .table-bg .margin-bottom {
            margin-bottom: 3px;
        }

        .result {
            color: red;
            font-weight: bold;
        }

        .remarks {
            margin-top: 20px;
        }

        p {
            margin-top: 20px;
        }

        .signature {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="page">
        <div>
            <img class="school-logo" src="{{ $getSetting->getLogo() }}" alt="" style="float: right; margin-right: 10px;">
        </div>
            <div class="header">
            
            <div class="school-details">
                <div class="school-title">{!! $getSetting->school_name !!}</div>
            </div>
        </div>

        <div class="student-info">
            <img class="student-image" src="{{ $getStudent->getProfileDirect() }}" alt="">
            <div class="student-details">
                <div class="gender">Gender: {{ $getStudent->gender }}</div>
                <table>
                    <tbody>
                        <tr>
                            <td>Name Of Student</td>
                            <td>{{ $getStudent->name }} {{ $getStudent->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Admission Number</td>
                            <td>{{ $getStudent->admission_number }}</td>
                        </tr>
                        <tr>
                            <td>Class</td>
                            <td>{{ $getClass->class_name }}</td>
                        </tr>
                        <tr>
                            <td>EXAM SET: </td>
                            <td></td>
                            <td>{{ $getExam->name }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Total Score</td>
                            <td></td>
                            <td>Average</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <table class="table-bg">
                <thead>
                  <tr>
                    <th style="text-align: left;">Exams Done</th>
                    <th>Class Work</th>
                    <th>Test Work</th>
                    <th>Home Work</th>
                    <th>Final Exam</th>
                    <th>Total Score</th>
                    <th>Passing Mark</th>
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
                    @foreach ($getExamMark as $exam)
                    @php
                       $total_score = $total_score + $exam['total_score'];
                       $full_marks = $full_marks + $exam['full_marks'];

                       if ($exam['total_score'] < $exam['passing_mark']) {
            $result_validation = 1; // Set to fail if any subject is failed
                      }
                    @endphp
                    <tr>
                      <td class="td" style="width: 300px; text-align:left;">  {{ $exam['subject_name'] }}</td>
                      <td class="td">  {{ $exam['class_work'] }}</td>
                      <td class="td">  {{ $exam['test_work'] }}</td>
                      <td class="td">  {{ $exam['home_work'] }}</td>
                     <td class="td"> {{ $exam['exam'] }}</td>
                     <td class="td"> {{ $exam['total_score'] }}</td>
                     <td class="td"> {{ $exam['passing_mark'] }}</td>
                     <td class="td"> {{ $exam['full_marks'] }}</td>

                     <td class="td">
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
                      <td class="td" colspan="2"><b>Grand Total : {{ $total_score }}/{{ $full_marks }}</b></td>

                      <td class="td" colspan="2">
                        @php
                        $percentage = ($total_score * 100) / $full_marks;
                        $getGrade = App\Models\MarksGradeModel::getGrade($percentage);

                        @endphp
                        <b>Percentage : {{ round(($total_score * 100) / $full_marks, 2) }} %</b></td>

                      <td class="td" colspan="2"><b>Grade : {{ $getGrade }}</b></td>

                      <td class="td" colspan="3"><b>Result : @if($result_validation == 0) 
                        <span style="color: green">Pass</span>
                          @else 
                          <span style="color: red">Fail</span>
                         @endif</b></td>
                    </tr>
                  </tbody>  
            </table>
        </div>
        <div class="remarks">
            <p>{!! $getSetting->exam_description !!}</p>
        </div>

        <div class="signature">
            <table>
                <tbody>
                    <tr>
                        <td>Signature:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
    
</body>
</html>
