@extends('home')

@section('content-header')
    <h1>
        Master Service
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li class="active">Master Service</li>
    </ol>
@endsection

@section('main-content')
    <div class="container">
        <a href="#" class="btn btn-success">
            Add Master Service <i class="fa fa-plus"></i>
        </a>

    </div>
@endsection