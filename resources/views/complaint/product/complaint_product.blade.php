@extends('home')

@push('scripts')
    <script src="{{ asset('js/tree-crud/tree-crud-product-function.js') }}" type="text/javascript"></script>
@endpush

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint.index') }}"><i class="fa fa-question-circle"></i> Complaint</a></li>
        <li class="active">Product</li>
    </ol>

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ $masterProduct->cover_image }}" alt="..." width="64" height="64">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $masterProduct->name }}</h4>
            <small class="text-blue">*Please choose category that you want to complaint</small>
        </div>
    </div>
@endsection

@section('main-content')
    {{ Form::hidden('master_product_id', $masterProduct->id, ['id' => 'master_product_id']) }}

    <button class="btn btn-danger btn-flat">
        Add Complaint <i class="ion ion-plus-circled"></i>
    </button>

    <div id="complaint_product_tree" class="fancytree-colorize-hover fancytree-fade-expander"></div>

    <h3>Complaint List</h3>

    <table class="table table-striped" id="table_complaint_product" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Customer Name</th>
                <th>Category</th>
                <th>Complaint content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection