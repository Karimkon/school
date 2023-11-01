@extends('layouts.app')
@section('style')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Submit My Class Assignment</h1>
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
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">

                <div class="form-group">
                    <label>Document</label>
                    <input type="file" name="document_file" class="form-control">
                </div>

                  <div class="form-group">
                    <label>Description<span style="color:brown">*</span></label>
                    <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">  
                      </textarea>
                  </div>
                </div>    

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Upload Homework</button>
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