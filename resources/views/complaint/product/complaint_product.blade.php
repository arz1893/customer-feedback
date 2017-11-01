@extends('home')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint.index') }}"><i class="fa fa-question-circle"></i> Complaint</a></li>
        <li class="active">Product</li>
    </ol>

    <h3>{{ $masterProduct->name }}</h3>
@endsection

@section('main-content')

    @foreach($subMasterProducts as $subMasterProduct)
        <a href="#" data-toggle="modal" data-target="#modal_add_complaint">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-info">
                    <div class="panel-body bg-aqua">
                        <p class="text-center">{{ $subMasterProduct->name }}</p>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    <div class="container">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_add_complaint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-danger" id="myModalLabel">Add Complaint</h4>
                </div>
                {{ Form::open() }}
                <div class="modal-body">
                    <div class="form-group">
                        <b>
                            Select Customer Type
                        </b>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       data-toggle="toggle"
                                       id="toggle_anonymous"
                                       data-on="Select Customer"
                                       data-off="Anonymous Customer"
                                       data-width="170"
                                       data-height="30"
                                       >
                            </label>
                        </div>
                    </div>

                    <div class="form-group" id="cust_name_container" style="display: none;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter customer's name">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-plus-circle"></i> Add
                                </button>
                            </span>
                        </div><!-- /input-group -->
                    </div>

                    <label for="">Customer's rating</label>
                    <div id="smileys" class="form-group">
                        <input type="radio" name="smiley" value="sad" class="sad">
                        <input type="radio" name="smiley" value="neutral" class="neutral">
                        <input type="radio" name="smiley" value="happy" class="happy">
                    </div>
                    <div class="form-group">
                        {{ Form::label('content', 'Customer\'s complaint', ['class' => 'control-label']) }}
                        {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Enter customer\'s complaint']) }}
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No"> Feedback Call
                        </label>

                        <label class="checkbox-inline">
                            <input type="checkbox" checked data-toggle="toggle" data-on="Yes" data-off="No"> Urgent
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Add Complaint</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection