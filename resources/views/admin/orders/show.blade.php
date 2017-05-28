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
            <li class="active">Order No. {{ $order->id }}</li>
        </ol>
    </section>

    <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
            <div class="row">
                <div class="col-xs-2">
                    <h4><i class="fa fa-info"></i> Order status:</h4>
                </div>
                <div class="col-xs-3">
                    <select name="status" class="form-control" required>
                        <option>Select status</option>
                        @foreach ($allStatuses as $key => $value)
                            <option value="{{ $key }}"
                            @if(isset($order->status_id))
                                {{ $key == $order->status_id ? 'selected="selected"' : '' }}
                            @endif
                            >{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Marco.tk
                    <small class="pull-right">Date: {{ $order->created_at->toFormattedDateString() }} </small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            @foreach($order->addresses as $address)
            <div class="col-sm-4 invoice-col">
                @if($loop->iteration == 1)
                    Shipping Address
                @else
                    Billing Address
                @endif
                <address>
                    <strong>{{ $address->first_name }} {{ $address->last_name }}</strong><br>
                    {{ $address->street }}, {{ $address->apartment }}<br>
                    {{ $address->city }}, {{ $address->state }} {{ $address->zip_code }}<br>
                    Phone: {{ $address->phone }}<br>
                    Email: {{ $order->email }}
                </address>
            </div>
            <!-- /.col -->
            @endforeach

            <div class="col-sm-4 invoice-col">
                <br>
                <b>Order ID:</b> {{ $order->id }}<br>
                <b>Payment Due:</b> {{ $order->created_at }}<br>
                <b>Account:</b>
                @if($order->user_id == 0)
                    GUEST
                @else
                    {{ $order->user_id }}
                @endif
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Serial #</th>
                            <th>Size</th>
                            <th>Unit Price</th>
                            <th>Discount</th>
                            <th>Description</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->pivot->qty }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->specification }}</td>
                                <td>{{ $item->size_name }}</td>
                                <td>${{ $item->pivot->price }}</td>
                                <td>
                                    @if($item->pivot->discount)
                                        {{ $item->pivot->discount }}%
                                    @endif
                                </td>
                                <td>
                                    <div class="product-description detail-info-entry">
                                        {{ $item->description }}
                                    </div>
                                </td>
                                <td>${{ $item->pivot->sub_total }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                <p class="lead">Additional Notes:</p>
                {{--<img src="/AdminLTE/dist/img/credit/visa.png" alt="Visa">
                <img src="/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="/AdminLTE/dist/img/credit/american-express.png" alt="American Express">
                <img src="/AdminLTE/dist/img/credit/paypal2.png" alt="Paypal">--}}

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    @if($order->note)
                        {{ $order->note }}
                    @else
                        None
                    @endif
                </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <p class="lead">Amount Due:</p>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>${{ $order->subtotal }}</td>
                        </tr>
                        {{--<tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>--}}
                        <tr>
                            <th>Shipping:</th>
                            <td>${{ $order->shipping_cost }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>${{ $order->total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                </button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                </button>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection