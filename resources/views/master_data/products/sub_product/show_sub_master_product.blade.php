@extends('home')

@section('content-header')
    <div class="pull-right">
        <a href="{{ route('master_product.show', $masterProduct->id) }}" class="btn btn-link">
            <i class="fa fa-arrow-circle-left"></i> Back
        </a>
    </div>
    <h3 style="margin-top: 5px;">Sub Product Section</h3>
    <div class="container">
        <div class="row">
            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_add_complaint">
                <i class="fa fa-plus-circle"></i> Add Complaint
            </a>
            <a href="#" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> Add Sub
            </a>
        </div>
    </div>
@endsection

@section('main-content')

    <div class="col-lg-2 col-md-2 col-xs-4 col-lg-offset-5 col-md-offset-4 col-xs-offset-4">
        <div class="panel panel-info">
            <div class="panel-body bg-aqua">
                <p class="text-center">{{ $subMasterProduct->name }}</p>
            </div>
        </div>
    </div>


@endsection