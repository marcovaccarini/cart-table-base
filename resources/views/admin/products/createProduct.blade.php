@extends('layouts.admin')

@section('head-script')

    <link href="/AdminLTE/dist/css/all-krajee.css" rel="stylesheet">
    <link href="/AdminLTE/dist/css/fileinput.min.css" rel="stylesheet">
    <link href="/AdminLTE/dist/css/theme.css" rel="stylesheet">


@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><i class="fa fa-barcode"></i> Product
            <small><i class="fa fa-plus-square"></i> Add new product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add new Products</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- Main row -->
        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Select the category of the new product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <form method="POST" action="/admin/product" id="my-awesome-dropzone"
                                  class="dropzone" style="border:0;" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('partials.admin._productForm')
                                <!-- Button col -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
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


@section('footer-script')
    @include('partials.admin._dropzoneScript')

@endsection