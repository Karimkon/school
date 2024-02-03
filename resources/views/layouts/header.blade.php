  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
<a class="nav-link toggle-button" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="font-size: 28px;"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     @php
       $getAllChatUserCount = App\Models\ChatModel::getAllChatUserCount();
     @endphp
      <li class="nav-item">
        <a class="nav-link" href="{{ url('chat') }}">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{ !empty($getAllChatUserCount) ? $getAllChatUserCount : '' }}</span>
        </a>
      </li>
      
            <!-- User Profile Dropdown Menu -->
<li class="nav-item dropdown">
     @php
            $accountUrl = '';
            switch (Auth::user()->user_type) {
                case 1:
                    $accountUrl = url('admin/account');
                    break;
                case 2:
                    $accountUrl = url('student/account');
                    break;
                case 3:
                    $accountUrl = url('teacher/account');
                    break;
                case 4:
                    $accountUrl = url('bursar/account');
                    break;
                case 5:
                    $accountUrl = url('parent/account');
                    break;
                // Add more cases for other user types as needed
            }
        @endphp

  <a class="nav-link" data-toggle="dropdown" href="#">
    <i class="fas fa-user"></i>
</a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="nav-link nav-link-user" href="{{ $accountUrl }}" class="dropdown-item">My Profile</a>
        <!-- Add other user-related links here if needed -->
        <div class="dropdown-divider"></div>
        <a href="{{ url('logout') }}" class="dropdown-item">Logout</a>
</li>

     

    </ul>
    </div>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 collapsed">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link" style="text-align: center">
      @if(!empty($getHeaderSetting->getLogo()))
      <img src="{{ $getHeaderSetting->getLogo() }}" alt="MISS" style="width:auto;height:30px;border-radius:5px;"><center>MADINA ISLAMIC S.S</center>
      @else
      <span class="brand-text font-weight-light" style="font-weight: bold !important;font-size: 20px">ISLAMIC SECONDARY SCHOOL</span>
      @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px;width: 40px;" src="{{ Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->user_type == 1)

          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard 
                </p>
            </a>
        </li>
 
        <li class="nav-item @if(in_array(Request::segment(2), ['bursar', 'student', 'parent', 'admin'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(in_array(Request::segment(2), ['class'])) active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    SYSTEM USERS
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                      
            <li class="nav-item">
              <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                      Admin
                  </p>
              </a>
          </li>

              <li class="nav-item">
                <a href="{{ url('admin/bursar/list') }}" class="nav-link @if(Request::segment(2) == 'bursar') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      bursar
                    </p>
                </a>
            </li>
              
              <li class="nav-item">
                  <a href="{{ url('admin/student/list') }}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                          Students
                      </p>
                  </a>
              </li>
              
                <li class="nav-item">
                  <a href="{{ url('admin/parent/list') }}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Parents
                    </p>
                  </a>
                </li>
      
                <li class="nav-item">
                  <a href="{{ url('admin/librarian/list') }}" class="nav-link @if(Request::segment(2) == 'librarian') active @endif">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                        Librarians
                      </p>
                  </a>
              </li>
      
            </ul>
        </li>





          <li class="nav-item @if(in_array(Request::segment(2), ['class', 'teacher', 'subject', 'assign_subject', 'assign_class_teacher', 'class_timetable'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(in_array(Request::segment(2), ['class'])) active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    ACADEMICS
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/class/list') }}" class="nav-link @if(in_array(Request::segment(2), ['class', 'teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Classes Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/teacher/list') }}" class="nav-link @if(in_array(Request::segment(2), ['teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teachers Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/subject/list') }}" class="nav-link @if(in_array(Request::segment(2), ['subject'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(in_array(Request::segment(2), ['assign_subject'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subject Assign</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if(in_array(Request::segment(2), ['assign_class_teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Classes to Teachers</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if(in_array(Request::segment(2), ['class_timetable'])) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Class TimeTable</p>
                  </a>
              </li>
            </ul>
        </li>






        <li class="nav-item @if(in_array(Request::segment(2), ['examinations','exam','exam_schedule','marks_register','marks_grade'])) menu-is-opening menu-open @endif">
          <a href="#" class="nav-link @if(in_array(Request::segment(2), ['examinations'])) active @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  EXAMINATIONS
                  <i class="fas fa-angle-left right"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ url('admin/examinations/exam/list') }}" class="nav-link @if(in_array(Request::segment(2), ['examinations', 'exam'])) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Exam List</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('admin/examinations/exam_schedule') }}" class="nav-link @if(in_array(Request::segment(2), ['examinations', 'exam_schedule'])) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Exams Schedule</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/examinations/marks_register') }}" class="nav-link @if(in_array(Request::segment(2), ['examinations', 'marks_register'])) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Exams Mark Register</p>
                </a>
              </li>

                <li class="nav-item">
                  <a href="{{ url('admin/examinations/marks_grade') }}" class="nav-link @if(in_array(Request::segment(2), ['examinations', 'marks_grade'])) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Marks Grade System</p>
                  </a>
              </li>
            </li>
          </ul>
      </li>
      





      <li class="nav-item @if(in_array(Request::segment(2), ['attendance','student_attendance', 'report'])) menu-is-opening menu-open @endif">
        <a href="#" class="nav-link @if(in_array(Request::segment(2), ['attendance'])) active @endif">
            <i class="nav-icon fas fa-table"></i>
            <p>
                ATTENDANCE
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('admin/attendance/student_attendance') }}" class="nav-link @if(in_array(Request::segment(2), ['attendance', 'student_attendance'])) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Attendance Schedule</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/attendance/report') }}" class="nav-link @if(in_array(Request::segment(2), ['attendance', 'report'])) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Attendance Report </p>
                </a>
            </li>

        </ul>
    </li>









      <li class="nav-item @if(in_array(Request::segment(2), ['communicate', 'notice_board', 'send_email'])) menu-is-opening menu-open @endif">
        <a href="#" class="nav-link @if(in_array(Request::segment(2), ['communicate'])) active @endif">
            <i class="nav-icon fas fa-table"></i>
            <p>
                COMMUNICATION 
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('admin/communicate/notice_board') }}" class="nav-link @if(in_array(Request::segment(2), ['communicate', 'notice_board'])) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Notice Board</p>
                </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/communicate/send_email') }}" class="nav-link @if(in_array(Request::segment(2), ['communicate', 'send_email'])) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Email</p>
              </a>
          </li>
        </ul>
    </li>



    <li class="nav-item @if(in_array(Request::segment(2), ['homework', 'studenthomework', 'homework_report'])) menu-is-opening menu-open @endif">
      <a href="#" class="nav-link @if(in_array(Request::segment(2), ['homework'])) active @endif">
          <i class="nav-icon fas fa-table"></i>
          <p>
              ASSIGNMENTS 
              <i class="fas fa-angle-left right"></i>
          </p>
      </a>
      <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="{{ url('admin/homework/studenthomework') }}" class="nav-link @if(in_array(Request::segment(2), ['homework', 'studenthomework'])) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Home work</p>
              </a>
          </li>
      </ul>

      <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('admin/homework/homework_report') }}" class="nav-link @if(in_array(Request::segment(2), ['homework', 'homework_report'])) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Student Home Report</p>
            </a>
        </li>
    </ul>
  </li>


  
  <li class="nav-item @if(in_array(Request::segment(2), ['fees_collection', 'collect_fes', 'collect_fees_report'])) menu-is-opening menu-open @endif">
    <a href="#" class="nav-link @if(in_array(Request::segment(2), ['fees_collection'])) active @endif">
        <i class="nav-icon fas fa-table"></i>
        <p>
            FEES COLLECTION 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('admin/fees_collection/collect_fees') }}" class="nav-link @if(in_array(Request::segment(2), ['fees_collection', 'collect_fes'])) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Collect Fees</p>
            </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('admin/fees_collection/collect_fees_report') }}" class="nav-link @if(in_array(Request::segment(2), ['collect_fees_report', 'collect_fes'])) active @endif">
              <i class="far fa-circle nav-icon"></i>
              <p>Collect Fees Report</p>
          </a>
      </li>

    </ul>
</li>



<li class="nav-item">
  <a href="{{ url('admin/setting') }}" class="nav-link @if(Request::segment(2) == 'setting') active @endif">
    <i class="fa-sharp fa-solid fa-gear"></i>
    <p>
       Settings
    </p>
  </a>
</li>

        

          <li class="nav-item">
            <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="fa-solid fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 3)

          <li class="nav-item">
            <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_class_subject') }}" class="nav-link @if(Request::segment(2) == 'my_class_subject') active @endif">
              <i class="fa-solid fa-chalkboard-user"></i>
              <p>
                My Classes & Subjects
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_exam_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="fa-solid fa-calendar-check"></i>
              <p>
              Exam Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_calendar') }}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/marks_register') }}" class="nav-link @if(Request::segment(2) == 'marks_register') active @endif">
              <i class="fa-solid fa-marker"></i>
              <p>
                Mark Register 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
              <i class="fa-solid fa-user-graduate"></i>
              <p>
                My Students
              </p>
            </a>
          </li>


          
    <li class="nav-item @if(in_array(Request::segment(2), ['homework', 'studenthomework'])) menu-is-opening menu-open @endif">
      <a href="#" class="nav-link @if(in_array(Request::segment(2), ['homework'])) active @endif">
          <i class="nav-icon fas fa-table"></i>
          <p>
              ASSIGNMENTS 
              <i class="fas fa-angle-left right"></i>
          </p>
      </a>
      <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="{{ url('teacher/homework/studenthomework') }}" class="nav-link @if(in_array(Request::segment(2), ['homework', 'studenthomework'])) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Home work</p>
              </a>
          </li>

      </ul>
  </li>




  <li class="nav-item @if(in_array(Request::segment(2), ['attendance','student', 'report'])) menu-is-opening menu-open @endif">
    <a href="#" class="nav-link @if(in_array(Request::segment(2), ['attendance'])) active @endif">
        <i class="nav-icon fas fa-table"></i>
        <p>
            ATTENDANCE SYSTEM
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('teacher/attendance/student') }}" class="nav-link @if(in_array(Request::segment(2), ['attendance', 'student'])) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Schedule Attendance </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('teacher/attendance/report') }}" class="nav-link @if(in_array(Request::segment(2), ['attendance', 'report'])) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Attendance Report </p>
            </a>
        </li>

    </ul>
</li>




          <li class="nav-item">
            <a href="{{ url('teacher/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
               School Notice Board
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('teacher/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="fa-solid fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>
          
          @elseif(Auth::user()->user_type == 2)

          <li class="nav-item">
            <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_calendar') }}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_subject') }}" class="nav-link @if(Request::segment(2) == 'my_subject') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Subjects
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_timetable') active @endif">
              <i class="fa-solid fa-calendar-check"></i>
              <p>
                My Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_exam_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="fa-solid fa-calendar-days"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{ url('student/my_exam_result') }}" class="nav-link @if(Request::segment(2) == 'my_exam_result') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               My Exam Results 
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('student/my_homework') }}" class="nav-link @if(Request::segment(2) == 'my_homework') active @endif">
              <i class="fa-solid fa-laptop-file"></i>
              <p>
               Class Assignments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_submitted_homework') }}" class="nav-link @if(Request::segment(2) == 'my_submitted_homework') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Submitted Assignments 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/fees_collection') }}" class="nav-link @if(Request::segment(2) == 'fees_collection') active @endif">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
               Check Tuition Balance
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('student/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
               School Notice Board
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('student/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="fa-solid fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>

          @elseif(Auth::user()->user_type == 5)

          <li class="nav-item">
            <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My Child / Student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Notice Board
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="fa-solid fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>













































          @elseif(Auth::user()->user_type == 4)

          <li class="nav-item">
            <a href="{{ url('bursar/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard 
                </p>
            </a>
        </li>
        
       
        <li class="nav-item">
            <a href="{{ url('bursar/student/list') }}" class="nav-link @if(Request::segment(2) == 'student') active @endif">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Students
                </p>
            </a>
        </li>
        
          <li class="nav-item">
            <a href="{{ url('bursar/parent/listb') }}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Parents
              </p>
            </a>
          </li>

         
      <li class="nav-item @if(in_array(Request::segment(2), ['communicate', 'notice_board', 'send_email'])) menu-is-opening menu-open @endif">
        <a href="#" class="nav-link @if(in_array(Request::segment(2), ['communicate'])) active @endif">
            <i class="nav-icon fas fa-table"></i>
            <p>
                 COMMUNICATION 
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('bursar/communicate/sms') }}" class="nav-link @if(in_array(Request::segment(2), ['communicate', 'sms'])) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SMS Center</p>
                </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('bursar/communicate/send_email') }}" class="nav-link @if(in_array(Request::segment(2), ['communicate', 'send_email'])) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Email</p>
              </a>
          </li>
        </ul>
    </li>



  <li class="nav-item @if(in_array(Request::segment(2), ['fees_collection', 'collect_fes', 'collect_fees_report'])) menu-is-opening menu-open @endif">
    <a href="#" class="nav-link @if(in_array(Request::segment(2), ['fees_collection'])) active @endif">
        <i class="nav-icon fas fa-table"></i>
        <p>
            FEES COLLECTION 
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('bursar/fees_collection/collect_fees') }}" class="nav-link @if(in_array(Request::segment(2), ['fees_collection', 'collect_fes'])) active @endif">
                <i class="far fa-circle nav-icon"></i>
                <p>Collect Fees</p>
            </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('bursar/fees_collection/collect_fees_report') }}" class="nav-link @if(in_array(Request::segment(2), ['collect_fees_report', 'collect_fes'])) active @endif">
              <i class="far fa-circle nav-icon"></i>
              <p>Collect Fees Report</p>
          </a>
      </li>

    </ul>
</li>


<li class="nav-item @if(in_array(Request::segment(2), ['inventory', 'procurement', 'budget'])) menu-is-opening menu-open @endif">
  <a href="#" class="nav-link @if(in_array(Request::segment(2), ['inventory'])) active @endif">
      <i class="nav-icon fas fa-table"></i>
      <p>
        FINANCE
          <i class="fas fa-angle-left right"></i>
      </p>
  </a>
  <ul class="nav nav-treeview">
      <li class="nav-item">
          <a href="{{ url('bursar/inventory/procurement') }}" class="nav-link @if(in_array(Request::segment(2), ['procurement'])) active @endif">
              <i class="far fa-circle nav-icon"></i>
              <p>Procurement</p>
          </a>
      </li>

      <li class="nav-item">
        <a href="{{ url('bursar/inventory/budget') }}" class="nav-link @if(in_array(Request::segment(2), ['budget'])) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Budget</p>
        </a>
    </li>

  </ul>
</li>
        
          <li class="nav-item">
            <a href="{{ url('bursar/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="fa-solid fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>













          @elseif(Auth::user()->user_type == 6)

          <li class="nav-item">
            <a href="{{ url('librarian/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard 
                </p>
            </a>
        </li>
 
        <li class="nav-item @if(in_array(Request::segment(2), ['books', 'authors', 'borrowed', 'admin'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(in_array(Request::segment(2), ['class'])) active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    BOOK MANAGEMENT
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                      
            <li class="nav-item">
              <a href="{{ url('librarian/books/list') }}" class="nav-link @if(Request::segment(2) == 'books') active @endif">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                      Add Books
                  </p>
              </a>
          </li>

              <li class="nav-item">
                <a href="{{ url('librarian/authors/list') }}" class="nav-link @if(Request::segment(2) == 'authors') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Authors
                    </p>
                </a>
            </li>
              
              <li class="nav-item">
                  <a href="{{ url('admin/borrowed/list') }}" class="nav-link @if(Request::segment(2) == 'borrowed') active @endif">
                      <i class="nav-icon far fa-user"></i>
                      <p>
                          Borrowed Books
                      </p>
                  </a>
              </li>
              
                <li class="nav-item">
                  <a href="{{ url('admin/parent/list') }}" class="nav-link @if(Request::segment(2) == 'parent') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Available Books 
                    </p>
                  </a>
                </li>
      
            </ul>
        </li>





          <li class="nav-item @if(in_array(Request::segment(2), ['class', 'teacher', 'subject', 'assign_subject', 'assign_class_teacher', 'class_timetable'])) menu-is-opening menu-open @endif">
            <a href="#" class="nav-link @if(in_array(Request::segment(2), ['class'])) active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    ACADEMICS
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/class/list') }}" class="nav-link @if(in_array(Request::segment(2), ['class', 'teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Classes Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/teacher/list') }}" class="nav-link @if(in_array(Request::segment(2), ['teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teachers Management</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/subject/list') }}" class="nav-link @if(in_array(Request::segment(2), ['subject'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subjects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(in_array(Request::segment(2), ['assign_subject'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Subject Assign</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/assign_class_teacher/list') }}" class="nav-link @if(in_array(Request::segment(2), ['assign_class_teacher'])) active @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Assign Classes to Teachers</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('admin/class_timetable/list') }}" class="nav-link @if(in_array(Request::segment(2), ['class_timetable'])) active @endif">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Class TimeTable</p>
                  </a>
              </li>
            </ul>
        </li>




          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>