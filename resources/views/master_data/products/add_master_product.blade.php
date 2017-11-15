@extends('home')

@section('content-header')
    {{--<h1>--}}
        {{--Add Product--}}
    {{--</h1>--}}
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li><a href="{{ route('master_product.index') }}"><i class="fa fa-truck"></i> Master Product</a></li>
        <li class="active">Add Product</li>
    </ol>
@endsection

@section('main-content')

    @include('layouts.errors.error_list')

    <div style="margin-top: 5px;">
        {{ Form::open(['action' => 'MasterData\MasterProductController@store', 'files' => true, 'id' => 'form-product']) }}
            @include('layouts.master_data.products.add_master_product_form')
        {{ Form::close() }}
    </div>

@endsection