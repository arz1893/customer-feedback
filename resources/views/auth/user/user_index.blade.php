@extends('home')

@section('content-header')
    <h1 class="text-muted">User Management</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Management</li>
    </ol>
@endsection

@section('main-content')

    <a href="{{ route('user.create') }}" class="btn btn-success">
        <i class="fa fa-user-plus"></i> Add User
    </a> <br> <br>

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    <table id="table_user" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->phone == null)
                            -
                        @else
                            {{ $user->phone }}
                        @endif
                    </td>
                    <td>{{ $user->user_type->name }}</td>
                    <td>
                        @if($user->status == 1)
                            <span class="text-blue">Active</span>
                        @else
                            <span class="text-red">Not Active</span>
                        @endif
                    </td>
                    <td>
                        <a href="#!" class="btn btn-danger">
                            <i class="ion ion-ios-trash"></i>
                        </a>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-warning">
                            <i class="ion ion-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection