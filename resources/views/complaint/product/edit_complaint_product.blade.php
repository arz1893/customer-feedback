@extends('home')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint_list_product.index') }}"><i class="ion ion-ios-list-outline"></i> Complaint Product</a></li>
        <li class="active">Edit Complaint Product</li>
    </ol>
@endsection

@section('main-content')
    <h3 class="text-red">Edit Complaint</h3>

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ \Session::get('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::model($complaintProduct, ['method' => 'PUT', 'action' => ['Complaint\ComplaintProductController@updateComplaintProduct', $complaintProduct->id], 'id' => 'form_edit_complaint_product']) }}
                @include('layouts.complaint_product.complaint_product_form', ['submitButtonText' => 'Update Complaint'])
            {{ Form::close() }}
        </div>
    </div>

    @include('customer.modal_add_customer')
@endsection