@extends('home')

@section('content-header')
    <h1>
        Edit Service
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li><a href="{{ route('master_service.index') }}"><i class="fa fa-hourglass-half"></i> Master Service</a></li>
        <li class="active">Edit Service</li>
    </ol>
@endsection

@section('main-content')
    {{ Form::model($masterService, ['method' => 'PATCH', 'action' => ['MasterData\MasterServiceController@update', $masterService]]) }}
        @include('layouts.master_data.services.master_service_form', ['submitButtonText' => 'Update Service'])
    {{ Form::close() }}
@endsection