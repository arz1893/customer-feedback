@extends('home')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint.index') }}"><i class="fa fa-question-circle"></i> Complaint</a></li>
        <li><a href="{{ route('complaint_product', $masterProduct->id) }}"><i class="ion ion-ios-pricetag"></i> {{ $masterProduct->name }}</a></li>
        <li class="active">Edit Complaint</li>
    </ol>

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ $masterProduct->cover_image }}" alt="..." width="64" height="64">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $masterProduct->name }}</h4>
            <small class="text-orange">*Please choose category that you want to complaint</small> <br>
            <a href="{{ route('complaint_product', $masterProduct->id) }}" class="btn btn-link">
                <i class="fa fa-arrow-circle-left"></i> Back
            </a>
        </div>
    </div>
@endsection

@section('main-content')
    <div class="container">
        <h3>Edit Complaint</h3>
        {{ Form::model($complaintProduct, ['method' => 'PUT', 'action' => ['Complaint\ComplaintProductController@updateComplaintProduct', $complaintProduct]]) }}
            @include('layouts.complaint_product.complaint_product_form')
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-refresh"></i> Update Complaint
            </button>
        {{ Form::close() }}
    </div>
@endsection