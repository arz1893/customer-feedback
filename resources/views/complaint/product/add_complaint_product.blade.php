@extends('home')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('complaint.index') }}"><i class="fa fa-question-circle"></i> Complaint</a></li>
        <li class="active">{{ $masterProduct->name }}</li>
    </ol>

@endsection

@section('main-content')

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

@endsection