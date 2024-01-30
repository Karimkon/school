@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Total Inventory Items: ({{ $TotalInventory }})</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('bursar/inventory/add') }}" class="btn btn-primary">Add New Inventory Item</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Search Inventory Item</h3>
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
                            <a href="{{ url('bursar/inventory/procurement') }}" style="margin-top: 30px"
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Amount Spent</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>
                                            @if(!empty($value->getInventoryItemPic()))
                                            <img src="{{ $value->getInventoryItemPic() }}"
                                                style="height: 50px; width: 50px; boarder-radius: 50px;">
                                            @endif
                                        </td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>{{ $value->unit_price }}</td>
                                        <td>{{ $value->quantity * $value->unit_price }}</td>
                                        <td>
                                          @if ($value->created_at)
                                              {{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                          @else
                                              N/A
                                          @endif
                                      </td>
                                        <td class="row" style="min-width: 150px">
                                            <a href="{{ url('bursar/inventory/edit/'.$value->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ url('bursar/inventory/delete/'.$value->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float:right">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                            <div>
                              <p>Total Amount Spent on All Assets: <strong>  {{ $getRecord->sum(function($item) { return $item->quantity * $item->unit_price; }) }} </strong></p>
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
