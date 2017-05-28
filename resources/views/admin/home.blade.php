@extends('layouts.admin')




@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <div class="progress-group">
                                    <span class="progress-text">Add Products to Cart</span>
                                    <span class="progress-number"><b>160</b>/200</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Complete Purchase</span>
                                    <span class="progress-number"><b>310</b>/400</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="progress-number"><b>480</b>/800</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Send Inquiries</span>
                                    <span class="progress-number"><b>250</b>/500</span>

                                    <div class="progress sm">
                                        <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">


                <div class="row">
                    <div class="col-md-6">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Orders</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td><a href="/admin/orders/{{ $order->id }}">{{ $order->id }}</a></td>
                                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                                <td><span class="label label-{{ $order->status->label }}">{{ $order->status->status_name }}</span></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <!-- FAVORITE PRODUCT LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Favorite products</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach($featureds as $featured)
                                        <li class="item">
                                            <div class="product-img">
                                                <a href="{{ $featured->path }}" class="image"><img alt="{{ $featured->product_name }}"
                                                                                                   src="/img/xs/{{ $featured->featured_image->filename }}"></a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ $featured->path }}" class="product-title">{{ $featured->product_name }}
                                                    @if($featured->custom_discount != null)
                                                        <span class="label label-danger pull-right">${{ $featured->discounted_price }}</span>
                                                    @else
                                                        <span class="label label-success pull-right">${{ $featured->price }}</span>
                                                    @endif
                                                </a>
                                                <span class="product-description">
                                                    {{ $featured->description }}
                                                </span>
                                            </div>
                                        </li>
                                        <!-- /.item -->
                                    @endforeach

                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All favorite products</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->



                <div class="row">
                    <div class="col-md-6">
                        <!-- NEW PRODUCT LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">New arrivals</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach($newarrivals as $newarrival)
                                        <li class="item">
                                            <div class="product-img">
                                                <a href="{{ $newarrival->path }}" class="image">
                                                    <img alt="{{ $newarrival->product_name }}" src="/img/xs/{{ $newarrival->featured_image->filename }}">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ $newarrival->path }}" class="product-title">{{ $newarrival->product_name }}
                                                    @if($newarrival->custom_discount != null)
                                                        <span class="label label-danger pull-right">${{ $newarrival->discounted_price }}</span>
                                                    @else
                                                        <span class="label label-success pull-right">${{ $newarrival->price }}</span>
                                                    @endif
                                                </a>
                                                <span class="product-description">
                                                    {{ $newarrival->description }}
                                                </span>
                                            </div>
                                        </li>
                                        <!-- /.item -->
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View all new arrivals products</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <!-- PROMOTIONS PRODUCT LIST -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Promotions</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @foreach($promotions as $promotion)
                                        <li class="item">
                                            <div class="product-img">
                                                <a href="{{ $promotion->path }}" class="image"><img alt="{{ $promotion->product_name }}"
                                                                                                    src="/img/xs/{{ $promotion->featured_image->filename }}"></a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ $promotion->path }}" class="product-title">{{ $promotion->product_name }}
                                                    @if($promotion->custom_discount != null)
                                                        <span class="label label-danger pull-right">${{ $promotion->discounted_price }}</span>
                                                    @else
                                                        <span class="label label-success pull-right">${{ $promotion->price }}</span>
                                                    @endif
                                                </a>
                                                <span class="product-description">
                                            {{ $promotion->description }}
                                        </span>
                                            </div>
                                        </li>
                                        <!-- /.item -->
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View all promotions</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->





            <div class="col-md-4">
                <!-- FAVORITE CATEGORIES -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Favorite categories</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($favorite_categories as $favorite_category)
                                <li class="item">
                                    <div class="product-img">
                                        <a href="{{ $newarrival->path }}" class="image">
                                            <img alt="{{ $favorite_category->title }}" src="/img/{{ $favorite_category->home_image }}">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{ $newarrival->path }}" class="product-title">
                                            {{ $favorite_category->title }}
                                        </a>
                                        <span class="product-description">
                                                    {{--{{ $newarrival->description }}--}}
                                                </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View all categories</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <!-- FEATURED TAGS IN HOME PAGE  -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Home page Featured Tags</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($favorite_tags as $favorite_tag)
                                <li class="item">
                                    <div class="product-img">
                                        <a href="/admin/tags/{{ $favorite_tag->slug }}" class="image">
                                            <img alt="{{ $favorite_tag->title }}" src="/img/{{ $favorite_tag->tag_img }}">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="/admin/tags/{{ $favorite_tag->slug }}" class="product-title">
                                            {{ $favorite_tag->title }}
                                        </a>
                                        <span class="product-description">
                                                    {{ $favorite_tag->description }}
                                                </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="/admin/tags" class="uppercase">View all tags</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->






                <br>



            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
