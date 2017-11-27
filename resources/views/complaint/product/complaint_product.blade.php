@extends('home')

@push('scripts')
    <script src="{{ asset('js/tree-crud/tree-complaint-product-function.js') }}" type="text/javascript"></script>
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

    @include('layouts.errors.error_list')

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    <button class="btn btn-danger btn-flat" onclick="setComplaintTarget(this)">
        Add Complaint <i class="ion ion-plus-circled"></i>
    </button>

    <button class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add_customer">
        Add User <i class="fa fa-user-plus"></i>
    </button>

    @include('customer.modal_add_customer')

    <div id="complaint_product_tree" class="fancytree-colorize-hover fancytree-fade-expander"></div>

    <h3>Complaint List</h3>

    <table class="table table-striped" id="table_complaint_product" style="width: 100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Customer Name</th>
                <th>Category</th>
                <th>Complaint content</th>
                <th>Need Call ?</th>
                <th>Is Urgent ?</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach($complaintProducts as $complaintProduct)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>
                        <a>
                            @if($complaintProduct->customer_id != null)
                                {{ $complaintProduct->customer->name }}
                            @else
                                Anonymous
                            @endif
                        </a>
                    </td>
                    <td>{{ $complaintProduct->product_category->name }}</td>
                    <td>{{ $complaintProduct->customer_complaint }}</td>
                    <td>{!! $complaintProduct->is_need_call == 1 ? '<span class="text-red">yes</span>':'<span class="blue-text">no</span>' !!}</td>
                    <td>{!! $complaintProduct->is_urgent == 1 ? '<span class="text-red">yes</span>':'<span class="blue-text">no</span>' !!}</td>
                    <td>
                        <a href="{{ route('edit_complaint_product', $complaintProduct->id) }}" class="btn btn-warning">
                            <i class="ion ion-edit"></i>
                        </a>
                        <button class="btn btn-danger" data-id="{{ $complaintProduct->id }}" onclick="deleteComplaintProduct(this)">
                            <i class="ion ion-ios-trash"></i>
                        </button>
                    </td>
                </tr>
                @php $counter++; @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Modal Add Complaint -->
    <div class="modal fade" id="modal_add_complaint_product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-danger" id="myModalLabel">Add Complaint</h4>
                </div>
                {{ Form::open(['action' => 'Complaint\ComplaintProductController@addComplaintProduct', 'id' => 'form_add_complaint_product']) }}
                <div class="modal-body">
                    <h4>Add complaint to : <span id="product_category_name" class="text-blue"></span> </h4>
                    @include('layouts.complaint_product.complaint_product_form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Add Complaint</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!-- Modal Remove Complaint -->
    <div class="modal fade" id="modal_remove_complaint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-danger" id="myModalLabel">Add Complaint</h4>
                </div>
                {{ Form::open(['action' => 'Complaint\ComplaintProductController@deleteComplaintProduct', 'id' => 'form_delete_complaint']) }}
                <div class="modal-body">
                    Are you sure want to delete this complaint ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Complaint</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection