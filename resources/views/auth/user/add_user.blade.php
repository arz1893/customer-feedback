@extends('home')

@section('content-header')
    <h1 class="text-muted">Add User</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="fa fa-users"></i> User Management
            </a>
        </li>
        <li class="active">
            Add User
        </li>
    </ol>
@endsection

@section('main-content')
    <div class="container">
        @include('layouts.errors.error_list')

        {{ Form::open(['action' => 'Auth\UserController@store', 'id' => 'form_add_user']) }}
            {{ Form::hidden('tenant_id', Auth::user()->tenant_id) }}
            @include('layouts.user.add_user_form', ['submitButtonText' => 'Add User'])
        {{ Form::close() }}
    </div>
@endsection