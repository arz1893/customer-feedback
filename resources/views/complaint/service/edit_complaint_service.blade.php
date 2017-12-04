@extends('home')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint_list_service.index') }}"><i class="ion ion-ios-list-outline"></i> Complaint Service</a></li>
        <li class="active">Edit Complaint Service</li>
    </ol>
@endsection

@section('main-content')
    <h3 class="text-red">Edit Complaint Service</h3>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::model($complaintService, ['method' => 'PUT', 'action' => ['Complaint\ComplaintServiceController@updateComplaintService', $complaintService], 'id' => 'form_edit_complaint_service']) }}
                @include('layouts.complaint_service.complaint_service_form', ['submitButtonText' => 'Update Complaint'])
            {{ Form::close() }}
        </div>
    </div>
@endsection