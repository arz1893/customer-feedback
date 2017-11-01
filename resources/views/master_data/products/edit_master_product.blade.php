@extends('home')

@section('content-header')
    {{--<h1>--}}
        {{--Edit Product--}}
    {{--</h1>--}}
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li><a href="{{ route('master_product.index') }}"><i class="fa fa-truck"></i> Master Product</a></li>
        <li class="active">Edit Product</li>
    </ol>
@endsection

@section('main-content')
    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    <div class="text-center">
        <img src="{{ asset($masterProduct->cover_image) }}" width="200" class="" alt="{{ $masterProduct->name }}">
    </div>
    <div class="text-center">
        <small class="text-muted">{{ $masterProduct->name }}</small>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['method' => 'PUT', 'action' => ['MasterData\MasterProductController@changePicture', $masterProduct], 'id' => 'form_change_picture', 'files' => true]) }}
            <div class="form-group col-md-offset-4">
                <input type="file" id="product_picture" name="product_picture" class="custom-file-input" aria-describedby="fileHelp">
                <p class="help-block">Change your product picture</p>
            </div>
            {{ Form::close() }}
            <br>

            {{ Form::model($masterProduct, ['method' => 'PATCH', 'action' => ['MasterData\MasterProductController@update', $masterProduct]]) }}
                @include('layouts.master_data.products.edit_master_product_form')
            {{ Form::close() }}
        </div>
    </div>
@endsection