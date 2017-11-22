@extends('home')

@section('content-header')
    <h1 class="text-muted">Edit User</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>
            <a href="{{ route('user.index') }}">
                <i class="fa fa-users"></i> User Management
            </a>
        </li>
        <li class="active">
            Edit User
        </li>
    </ol>
@endsection

@section('main-content')

    <div class="container">
        @include('layouts.errors.error_list')

        {{ Form::model($user, ['method' => 'PATCH', 'action' => ['Auth\UserController@update', $user], 'id' => 'form_edit_user']) }}
            @include('layouts.user.edit_user_form', ['submitButtonText' => 'Update User'])
        {{ Form::close() }}


    </div>
@endsection