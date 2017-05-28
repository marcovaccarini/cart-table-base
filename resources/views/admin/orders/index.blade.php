@extends('layouts.admin')




@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-shopping-cart"></i>
            Orders
            <small> <i class="fa fa-inbox"> </i> Latest order</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Latest orders</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Order Id</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Total order</th>
                                <th>Date</th>
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <a href="/admin/orders/{{ $order->id }}">{{ $order->id }}</a>
                                    </td>
                                    <td>
                                        @foreach($order->addresses as $address)
                                            {{ $address->first_name }} {{ $address->last_name }}
                                        @endforeach
                                    </td>
                                    <td class="text-nowrap">
                                        <span class="label label-{{ $order->status->label }}"> {{ $order->status->status_name }} </span>
                                    </td>
                                    <td>
                                        ${{ $order->total }}
                                    </td>
                                    <td>
                                        {{ $order->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection