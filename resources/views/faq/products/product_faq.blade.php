@extends('home')

@section('content-header')

    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('faq.index') }}"><i class="fa fa-question-circle"></i> FAQ</a></li>
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
            <a href="{{ route('add_product_faq', $masterProduct->id) }}" class="btn btn-primary">
                Add FAQ <i class="fa fa-plus-circle"></i>
            </a>
        </div>
    </div>

@endsection

@section('main-content')

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    @include('layouts.errors.error_list')

    <div class="row">
        @php $counter = 1; @endphp
        @foreach($faqProducts as $faqProduct)
            <div id="faq" class="col-md-12">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse-{{ $counter }}">
                                    {{ $faqProduct->question }}
                                </a>
                                <span class="pull-right accordion-toggle" data-toggle="collapse">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                            </h4>
                        </div>
                        <div id="collapse-{{ $counter }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    {{ $faqProduct->answer }}
                                </p>
                            </div>
                            <div class="panel-footer">
                                @if(Auth::user()->user_type_id == 1)
                                    <div class="">
                                        <a class="btn btn-warning btn-sm" href="{{ route('edit_product_faq', $faqProduct->id) }}" style="margin-right: 3px;">
                                            <i class="fa fa-pencil-square-o"></i> Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                           href="#"
                                           onclick="setDataId(this)"
                                           data-id="{{ $faqProduct->id }}"
                                           data-toggle="modal"
                                           data-target="#modal_delete_product_faq">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                    </div>
                                @else
                                    <div class="btn-group btn-group-xs">
                                <span class="btn">
                                    Was this question useful?
                                </span>
                                        <a class="btn btn-success" href="#"><i class="fa fa-thumbs-up"></i> Yes</a>
                                        <a class="btn btn-danger" href="#"><i class="fa fa-thumbs-down"></i> No</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php $counter++; @endphp
        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="modal_delete_product_faq"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         data-type="product_faq"
         data-id="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-orange" id="myModalLabel">
                        Warning <i class="fa fa-exclamation-triangle"></i>
                    </h4>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this FAQ ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit"
                            class="btn btn-primary"
                            data-modal="#modal_delete_product_faq"
                            onclick="deleteItem(this)"> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

@endsection