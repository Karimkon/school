@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>School Budget: ({{ $TotalBudget }})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('bursar/inventory/addbudget') }}" class="btn btn-primary">Add New Year Budget</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Budget Items</h3>
            </div>
            <form method="get" action="">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <label>Year</label>
                            <input type="text" class="form-control" name="year" value="{{ Request::get('year') }}"
                                placeholder="Enter Year">
                        </div>

                        <div class="form-group col-md-3">
                            <button class="btn btn-primary" type="submit" style="margin-top: 30px">Search</button>
                            <a href="{{ url('bursar/inventory/budget') }}" style="margin-top: 30px"
                                class="btn btn-success">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @include('_message')
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $budget)
                                    <tr>
                                        <td>{{ $budget->id }}</td>
                                        <td>{{ $budget->category }}</td>
                                        <td>{{ $budget->amount }}</td>
                                        <td>{{ $budget->year }}</td>
                                        <td class="row" style="min-width: 150px">
                                            <a href="{{ url('bursar/inventory/editbudget/'.$budget->id) }}"
                                                class="btn btn-primary">Edit</a>
                                                <a href="{{ url('bursar/inventory/deletebudget/'.$budget->id) }}" 
                                                class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this budget item?')">Delete</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float:right">
                                <!-- Add pagination links if needed -->
                            </div>
                            <div>
                              <p>Total Budget: <strong>  {{ $budgets->sum('amount') }} </strong></p>
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
