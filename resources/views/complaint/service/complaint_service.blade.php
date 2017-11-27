@extends('home')

@push('scripts')
    <script src="{{ asset('js/tree-crud/tree-complaint-service-function.js') }}" type="text/javascript"></script>
@endpush

@section('content-header')
    {{ Form::hidden('master_service_id', $masterService->id, ['id' => 'master_service_id']) }}

    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint.index') }}"><i class="fa fa-question-circle"></i> Complaint</a></li>
        <li class="active">Product</li>
    </ol>

    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{ asset($masterService->cover_image) }}" alt="..." width="64" height="64">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $masterService->name }}</h4>
            <small class="text-blue">*Please choose category that you want to complaint</small>
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

    <button class="btn btn-danger btn-flat">
        Add Complaint <i class="ion ion-plus-circled"></i>
    </button>

    <button class="btn btn-primary btn-flat">
        Add User <i class="fa fa-user-plus"></i>
    </button>

    <div id="complaint_service_tree"></div>

    <h3>Complaint List</h3>

    <table class="table table-hover table-striped" id="table_complaint_service" style="width: 100%;">
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

        </tbody>
    </table>
@endsection