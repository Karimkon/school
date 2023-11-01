@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Notice Board</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Title of Notice</label>
                    <input type="text" class="form-control" name="title" value="{{ $getRecord->title }}" required placeholder="Enter Title">
                  </div>

                  <div class="form-group">
                    <label>Date of Notice</label>
                    <input type="date" class="form-control" name="notice_date" value="{{ $getRecord->notice_date }}" required>
                  </div>
                 
                  
                  <div class="form-group">
                    <label>Publication Date</label>
                    <input type="date" class="form-control" name="publish_date" value="{{ $getRecord->publish_date }}" required>
                  </div>

                </div>
                <center>

                @php
                    $message_to_student = $getRecord->getMessageToSingle($getRecord->id,2);
                    $message_to_parent = $getRecord->getMessageToSingle($getRecord->id,5);
                    $message_to_teacher = $getRecord->getMessageToSingle($getRecord->id,3);
                @endphp
                <div class="form-group">
                    <label style="display: block;">Recipients</label> <br>

                   
                    <label style="margin-right: 50px;"> 
                        <input {{ !empty($message_to_student) ? 'checked' : '' }} type="checkbox" value="2" name="message_to[]">Student
                    </label>

                    <label style="margin-right: 50px;">
                         <input {{ !empty($message_to_parent) ? 'checked' : '' }} type="checkbox" value="5" name="message_to[]">Parents
                    </label>

                    <label style="margin-right: 50px;">
                         <input {{ !empty($message_to_teacher) ? 'checked' : '' }} type="checkbox" value="3" name="message_to[]">Teachers
                    </label>
                </center>
                </div>    


                <div class="form-group">
                    <label>Message</label>
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">  
                        {{ $getRecord->message }} </textarea>
                  </div>


                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('script')

<script src="{{ url('public/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script type="text/javascript">

  $(function () {

    $('#compose-textarea').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
        });

  });

</script>
@endsection 