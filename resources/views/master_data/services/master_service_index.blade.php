@extends('home')

@section('content-header')
    {{--<h1>--}}
        {{--Master Service--}}
    {{--</h1>--}}
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li class="active">Master Service</li>
    </ol>
@endsection

@section('main-content')
    <a href="{{ route('master_service.create') }}" class="btn btn-primary">
        <i class="fa fa-plus-circle"></i> Add Master Service
    </a>
    <br> <br>

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    <table class="table table-hover table-responsive" id="table_master_service" width="100%">
        <thead>
            <tr>
                <th>No. </th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach($masterServices as $masterService)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>
                        <a href="{{ route('master_service.show', $masterService) }}">
                            {{ $masterService->name }}
                        </a>
                    </td>
                    <td>{{ $masterService->description }}</td>
                    <td>
                        <a href="{{ route('master_service.edit', $masterService) }}" class="btn btn-warning">
                            <i class="fa fa-pencil-square-o"></i> Edit
                        </a>
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-id="{{ $masterService->id }}"
                            data-toggle="modal"
                            data-target="#modal_delete_service"
                            onclick="setDataId(this)">
                            <i class="fa fa-trash-o"></i> Delete
                        </button>
                    </td>
                </tr>
                @php $counter++; @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div
        class="modal fade"
        id="modal_delete_service"
        tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        data-type="service"
        data-id="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">
                        Warning <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete this service ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-type="service"
                        data-modal="#modal_delete_service"
                        onclick="deleteItem(this)">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection