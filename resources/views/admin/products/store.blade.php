@extends('layouts.admin')




@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-barcode"></i>
            Product
            <small>
            <i class="fa fa-edit"> </i>
                Edit
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
                        <h3 class="box-title">{{ $main_category->title }} :: {{ $category->title }} :: {{ $sub_category->title }}</h3>

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
                                <th> </th>
                                <th> </th>
                            </tr>
                            @forelse($products_list as $product)

                                @include('partials.admin._productsList')

                                <td>
                                    <a href="/admin/product/{{ $product->id }}/edit" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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
