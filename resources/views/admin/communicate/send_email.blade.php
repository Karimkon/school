@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ url('public/plugins/select2/css/select2.min.css') }}">
<style type="text/css">
.select2-container .select2-selection--single
{
    height: 40px;
}
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SEND EMAILS</h1>
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
            @include('_message')
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" required placeholder="Enter Subject">
                  </div>

                    <div class="form-group">
                      <label>RECIPIENTS (Students / Parents / Teachers)</label>
                      <select name="user_id" class="form-control select2" style="width: 100%;">
                        <option value="">Select</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label>Message</label>
                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px">  
                      </textarea>
                  </div>

                <center>
                <div class="form-group">
                    <label style="display: block;">Recipients</label> <br>

                   
                    <label style="margin-right: 50px;"> <input type="checkbox" value="2" name="message_to[]" id="">Student</label>

                    <label style="margin-right: 50px;"> <input type="checkbox" value="5" name="message_to[]" id="">Parents</label>

                    <label style="margin-right: 50px;"> <input type="checkbox" value="3" name="message_to[]" id="">Teachers</label>
                </center>
                </div>    

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Send Email</button>
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
<script src="{{ url('public/plugins/select2/js/select2.full.min.js') }}"></script>

<script type="text/javascript">

  $(function () {

    $('.select2').select2({
        ajax: {
            url: '{{ url('admin/communicate/search_user') }}',
            dataType: 'json',
            delay: 250,
            data: function (data) {
                return {
                    search: data.term,
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
        }
    });

    $('#compose-textarea').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
        });

  });

</script>
@endsection 