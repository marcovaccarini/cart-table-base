@extends('layouts.admin')




@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-barcode"></i>
            Product
            <small>
                @if($section == 'featured')
                    <i class="fa fa-bookmark"> </i>
                @elseif($section == 'new')
                    <i class="fa fa-star"> </i>
                @elseif($section == 'promotion')
                    <i class="fa fa-bomb"> </i>
                @endif

                {{$section}}
            </small>
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
                        <h3 class="box-title">{{$section}} products in home page</h3>
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
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Home&nbsp;page</th>
                                <th> </th>
                            </tr>
                            @forelse($products_list as $product)
                                @include('partials.admin._productsList')
                                    <td>
                                        @if($section == 'featured')
                                            @include('partials.admin._featuredProduct')
                                        @elseif($section == 'new')
                                            @include('partials.admin._newProduct')
                                        @elseif($section == 'promotion')
                                            @include('partials.admin._promotionProduct')
                                        @endif


                                    </td>
                                    <td>
                                        <a href="/admin/product/{{ $product->id }}/edit" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <h3>There are no articles in this category</h3>
                                        <div class="col-md-12">
                                            <form method="POST" action="/admin/products">
                                            {{ csrf_field() }}
                                            @include('partials.admin._categorySelect')
                                            <!-- Button col -->
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                <!-- /.col -->
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforelse
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