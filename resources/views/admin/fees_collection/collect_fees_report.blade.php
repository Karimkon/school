@extends('layouts.app')
@section('content')
   
   
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>FEES COLLECTION REPORT</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Search Fees</h3>
                </div>
                <form method="get" action="">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Student's ID</label>
                                <input type="text" class="form-control" name="student_id" value="{{ Request::get('student_id') }}" placeholder="Enter Student's ID">
                            </div>

                            <div class="form-group col-md-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="student_name" value="{{ Request::get('student_name') }}" placeholder="Enter Student Name">
                            </div>
            
                            <div class="form-group col-md-3">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="student_last_name" value="{{ Request::get('student_last_name') }}" placeholder="Enter Last Name">
                            </div>
            
                            <div class="form-group col-md-2">
                                <label>Class Name</label>
                                <select class="form-control" name="class_id">
                                    <option value="">Select</option>
                                    @foreach ($getClass as $class)
                                        <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Payment Type</label>
                                <select class="form-control" name="payment_type">
                                    <option value="">Select</option>
                                    <option {{ (Request::get('payment_type') == 'Cash') ? 'selected' : '' }} value="Cash">Cash</option>
                                    <option {{ (Request::get('payment_type') == 'Cheque') ? 'selected' : '' }} value="Cheque">Cheque</option>
                                    <option {{ (Request::get('payment_type') == 'Stripe') ? 'selected' : '' }} value="Stripe">Stripe</option>

                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Start Created Date</label>
                                <input type="date" class="form-control" name="start_created_date" value="{{ Request::get('start_created_date') }}" placeholder="Enter Last Name">
                            </div>

                            <div class="form-group col-md-2">
                                <label>End Created Date</label>
                                <input type="date" class="form-control" name="end_created_date" value="{{ Request::get('end_created_date') }}" placeholder="Enter Last Name">
                            </div>
            
            
                            <div class="form-group col-md-3">
                                <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                                <a href="{{ url()->current() }}" style="margin-top: 30px" class="btn btn-success">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            

          <div class="col-md-6">
            
            @include('_message')

          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-header">
                <h3 class="card-title">Payment Details</h3>
                <form style="float: right;" action="{{ url('admin/fees_collection/export_collect_fees_report') }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{ Request::get('student_id') }}" name="student_id">
                  <input type="hidden" value="{{ Request::get('student_name') }}" name="student_name">
                  <input type="hidden" value="{{ Request::get('student_last_name') }}" name="student_last_name">
                  <input type="hidden" value="{{ Request::get('class_id') }}" name="class_id">
                  <input type="hidden" value="{{ Request::get('payment_type') }}" name="payment_type">
                  <input type="hidden" value="{{ Request::get('start_created_date') }}" name="start_created_date">
                  <input type="hidden" value="{{ Request::get('end_created_date') }}" name="end_created_date">

                  <button type="submit" class="btn btn-primary">Export as Excel</button>
                </form>
              </div>
              <div class="card-body p-0 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Class Name</th>
                            <th>Total Fees Amount</th>
                            <th>Total Paid Amount</th>
                            <th>Remaining Amount</th>
                            <th>Payment Type</th>
                            <th>Remarks</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                     @forelse ($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->student_id }}</td>
                            <td>{{ $value->student_name_first }} {{ $value->student_name_last }}</td>
                            <td>{{ $value->class_name }}</td>

                            <td>Shs.{{ number_format($value->total_amount, 2) }}</td>
                            <td>Shs.{{ number_format($value->paid_amount, 2) }}</td>
                            <td>Shs.{{ number_format($value->remaining_amount, 2) }}</td>
                            <td>{{ $value->payment_type }}</td>
                            <td>{{ $value->remark }}</td>
                            <td>{{ $value->created_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        </tr>
                    
                     @empty
                         <tr>
                            <td colspan="100%">No Record Found</td>
                         </tr>
                     @endforelse
                    </tbody>
                </table>
                <div style="padding: 10px; float:right">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>
            
                
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection

@section('script')

@endsection