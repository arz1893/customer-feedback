@extends('home')

@section('content-header')
    <h1 class="text-muted">Master Data</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Master Data</li>
    </ol>
@endsection

@section('main-content')
    <div class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('master_product.index') }}">
                    <div class="info-box bg-blue">
                        <span class="info-box-icon"><i class="fa fa-truck"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="product-description">
                                {{ $productCounter }} item
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('master_service.index') }}">
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="fa fa-trophy"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Services</span>
                            <span class="info-box-number"></span>
                            <span class="progress-description">
                                {{ $serviceCounter }} item
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection