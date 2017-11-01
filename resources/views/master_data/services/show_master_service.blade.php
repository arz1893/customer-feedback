@extends('home')

@section('content-header')
    <h1 class="text-muted">Service Detail</h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('master_data.index') }}"><i class="fa fa-database"></i> Master Data</a></li>
        <li><a href="{{ route('master_service.index') }}"><i class="fa fa-trophy"></i> Master Service</a></li>
        <li class="active">{{ $masterService->name }}</li>
    </ol>
@endsection

@section('main-content')

    <div class="span8">
        <div class="text-center">
            @if($masterService->cover_image == null)
                <img src="{{ asset('default-images/handshake-icon.png') }}" width="200" class="" alt="{{ $masterService->name }}">
            @else
                <img src="{{ asset($masterService->cover_image) }}" width="200" class="" alt="{{ $masterService->name }}">
            @endif
        </div>
        <h1>{{ $masterService->name }}</h1>
        <p>{{ $masterService->description }}</p>
    </div>

    <hr>

    <div class="row">
        <div class="col-sm-6">
            <div class="rating-block">
                <h4>Average user rating</h4>
                <h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-sm-3">
            <h4>Rating breakdown</h4>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">1</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">1</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
            <div class="pull-left">
                <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                </div>
                <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                            <span class="sr-only">80% Complete (danger)</span>
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin-left:10px;">0</div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="#">FAQ</a></li>
            <li role="presentation"><a data-toggle="tab" href="#complaints_tab">Complaints</a></li>
            <li role="presentation" class="active"><a data-toggle="tab" href="#suggestions_tab">Suggestions</a></li>
        </ul>

        <div class="tab-content">
            <div id="suggestions_tab" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                    <div class="review-block-name"><a href="#">nktailor</a></div>
                                    <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="review-block-rate">
                                        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="review-block-title">this was nice in buy</div>
                                    <div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="complaints_tab" class="tab-pane fade in">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                    <div class="review-block-name"><a href="#">Anonymous</a></div>
                                    <div class="review-block-date">January 29, 2016<br/>1 day ago</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="review-block-rate">
                                        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div class="review-block-title text-danger">Poor service </div>
                                    <div class="review-block-description">
                                        hope it wont't happen again when i came
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection