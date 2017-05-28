@extends('layouts.admin')




@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-barcode"></i> Product
            <small><i class="fa fa-edit"></i> Edit </small>
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

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">

                        <h3 class="box-title">Select the category of the product to edit</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <form method="POST" action="/admin/products" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('partials.admin._categorySelect')

                                <!-- Button col -->
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <!-- /.col -->
                            </form>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <div class="box-footer">
                        <div class="row">

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>



        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
