  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ url('public/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="public/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('chat') }}" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
     

    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link" style="text-align: center">
      @if(!empty($getHeaderSetting->getLogo()))
      <img src="{{ $getHeaderSetting->getLogo() }}" alt="MISS" style="width:auto;height:60px;border-radius:5px;"><center>ACADEMIA</center>
      @else
      <span class="brand-text font-weight-light" style="font-weight: bold !important;font-size: 20px">ACADEMIA</span>
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
        
        @if(Auth::user()->user_type == 1)
            <li class="nav-item">
                <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Admin
                    </p>
                </a>
            </li>
        @endif
        
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
                  EXAMINATIONS MODULE
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
                ATTENDANCE SYSTEM
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
                SCHOOL COMMUNICATION 
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
              HOME WORK MANAGEMENT 
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
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
       Settings
    </p>
  </a>
</li>

        
          <li class="nav-item">
            <a href="{{ url('admin/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Classes & Subjects
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_exam_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Exam Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_calendar') }}" class="nav-link @if(Request::segment(2) == 'my_calendar') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Calendar
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/marks_register') }}" class="nav-link @if(Request::segment(2) == 'marks_register') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Mark Register 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/my_student') }}" class="nav-link @if(Request::segment(2) == 'my_student') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Students
              </p>
            </a>
          </li>


          
    <li class="nav-item @if(in_array(Request::segment(2), ['homework', 'studenthomework'])) menu-is-opening menu-open @endif">
      <a href="#" class="nav-link @if(in_array(Request::segment(2), ['homework'])) active @endif">
          <i class="nav-icon fas fa-table"></i>
          <p>
              HOME WORK MANAGEMENT 
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
                <p>Student Attendance Schedule</p>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               School Notice Board
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('teacher/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Timetable
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/my_exam_timetable') }}" class="nav-link @if(Request::segment(2) == 'my_exam_timetable') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Class Assignment 
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Check Tuition Balance
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('student/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               School Notice Board
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ url('student/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('student/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Child / Student
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/my_notice_board') }}" class="nav-link @if(Request::segment(2) == 'my_notice_board') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Notice Board
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Account
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('parent/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon far fa-user"></i>
              <p>
                Change Password
              </p>
            </a>
          </li>

          @endif

          
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>