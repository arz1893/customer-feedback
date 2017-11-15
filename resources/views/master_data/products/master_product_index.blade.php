@extends('home')

@section('content-header')
    {{--<h1>--}}
        {{--Master Product--}}
    {{--</h1>--}}
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li class="active">Master Product</li>
    </ol>
@endsection

@section('main-content')

    <a href="{{ route('master_product.create') }}" class="btn btn-primary">
        <i class="fa fa-plus-circle"></i> Add Product
    </a>
    <br><br>

    @if(\Session::has('status'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ \Session::get('status') }}
        </div>
    @endif

    <table class="table table-hover table-condensed" cellspacing="0" width="100%" id="table_master_product">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Specification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterProducts as $masterProduct)
                <tr>
                    <td>
                        <img src="{{ asset($masterProduct->cover_image) }}" width="100">
                    </td>
                    <td><a href="{{ route('master_product.show', $masterProduct) }}">{{ $masterProduct->name }}</a></td>
                    <td>{{ $masterProduct->description }}</td>
                    <td>
                        @if($masterProduct->specification == null)
                            -
                        @else
                            {{ $masterProduct->specification }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('master_product.edit', $masterProduct) }}" class="btn btn-warning">
                            <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <button
                            class="btn btn-danger"
                            data-toggle="modal"
                            data-target="#modal_delete_product"
                            data-id="{{ $masterProduct->id }}"
                            onclick="setDataId(this)">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div
        class="modal fade"
        id="modal_delete_product"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal_delete_product"
        aria-hidden="true"
        data-type="product"
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
                    Are you sure want to delete this item ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-type="product"
                        data-modal="#modal_delete_product"
                        onclick="deleteItem(this)"> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection