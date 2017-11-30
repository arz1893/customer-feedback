@extends('home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/vue-animation/vue2-animate.css') }}"
          xmlns:v-on="http://www.w3.org/1999/xhtml">
@endpush

@push('scripts')
    <script src="{{ asset('js/vue-function.js') }}" type="text/javascript"></script>
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

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ \Session::get('status') }}
        </div>
    @endif

    <div id="vue_container">

        <transition name="fadeDown">
            <a href="#!" class="btn btn-link btn-lg" id="btn_show_category_navigator" v-on:click="showNavigator()" v-if="!show">
                <i class="fa fa-arrow-circle-left"></i> Back
            </a>
        </transition>

        <transition name="fadeDown">
            <div id="category_navigator" v-if="show">
                <h3>Categories</h3>

                @if(isset($currentParentNode))
                    @if($currentParentNode->parent_id == null)
                        <a href="{{ route('complaint_product', [$masterProduct->id, 0]) }}" class="btn btn-link btn-lg">
                            <i class="fa fa-arrow-circle-up"></i> Up One Level
                        </a> <br>
                    @else
                        <a href="{{ route('complaint_product', [$masterProduct->id, $currentParentNode->parent_id]) }}" class="btn btn-link btn-lg">
                            <i class="fa fa-arrow-circle-up"></i> Up One Level
                        </a> <br>
                    @endif
                @endif

                @foreach($productCategories as $productCategory)
                    @if(count($productCategory->getImmediateDescendants()) > 0)
                        <a href="{{ route('complaint_product', [$masterProduct->id, $productCategory->id]) }}" class="btn btn-app">
                            <span class="badge bg-aqua">{{ count($productCategory->getImmediateDescendants()) }}</span>
                            <i class="ion ion-pricetag" aria-hidden="true"></i> {{ $productCategory->name }}
                        </a>
                    @elseif(count($productCategory->getImmediateDescendants()) == 0)
                        <button class="btn btn-app active"
                                data-node_id="{{ $productCategory->id }}"
                                data-product_id="{{ $masterProduct->id }}"
                                data-title="{{ $productCategory->name }}"
                                v-on:click="append('{{ $productCategory->name }}', '{{ $masterProduct->id }}', '{{ $productCategory->id }}')">
                            <i class="ion ion-pricetag" aria-hidden="true"></i> {{ $productCategory->name }}
                        </button>
                    @endif
                @endforeach
            </div>
        </transition>

        @include('layouts.errors.error_list')

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <transition name="fadeDown">
                    <div class="panel panel-danger" id="panel_add_complaint" v-if="!show">
                        <div class="panel-heading">
                            <h4>Add Complaint</h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <span v-html="nodeTitle"></span>
                            </div>
                            {{ Form::open(['action' => 'Complaint\ComplaintProductController@addComplaintProduct', 'id' => 'form_add_complaint_product']) }}
                            <div v-html="masterProductId"></div>
                            <div v-html="productCategoryId"></div>
                            {{ Form::hidden('tenant_id', Auth::user()->tenant_id) }}
                            @include('layouts.complaint_product.complaint_product_form')
                            {{ Form::close() }}
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>

    {{--<button class="btn btn-danger btn-flat" onclick="setComplaintTarget(this)">--}}
        {{--Add Complaint <i class="ion ion-plus-circled"></i>--}}
    {{--</button>--}}

    {{--<button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add_customer">--}}
        {{--Add User <i class="fa fa-user-plus"></i>--}}
    {{--</button>--}}

    {{--@include('customer.modal_add_customer')--}}

    {{--<div id="complaint_product_tree" class="fancytree-colorize-hover fancytree-fade-expander"></div>--}}

@endsection