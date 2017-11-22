@extends('home')

@section('content-header')
    <a href="{{ route('home') }}" class="btn btn-link">
        <i class="fa fa-arrow-circle-left"></i> Back
    </a>

    <h2 class="text-center text-danger" style="margin-top: -33px;">Complaint</h2>

    <div class="centered-pills" style="margin-top: 5px;">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a data-toggle="pill" href="#product_panel">Product</a></li>
            <li role="presentation"><a data-toggle="pill" href="#service_panel">Service</a></li>
        </ul>
    </div>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    <br>

    <div class="tab-content">
        <div id="product_panel" class="tab-pane fade in active">
            <div class="row">
                @foreach($masterProducts as $masterProduct)
                    <a href="{{ route('complaint_product', $masterProduct->id) }}">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                            <div class="hovereffect">
                                <img class="img-responsive" src="{{ asset($masterProduct->cover_image) }}" style="width: 100%; height: 100px;">
                                <div class="overlay">
                                    <h3>{{ $masterProduct->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="row">
                <div class="text-center">
                    {{ $masterProducts->links() }}
                </div>
            </div>
        </div>
        <div id="service_panel" class="tab-pane fade">
            <div class="row">
                @foreach($masterServices as $masterService)
                    <a href="{{ route('service_faq', $masterService->id) }}">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                            <div class="hovereffect">
                                @if($masterService->cover_image != null)
                                    <img class="img-responsive" src="{{ asset($masterService->cover_image) }}" style="width: 100%; height: 100px;">
                                @else
                                    <img class="img-responsive" src="{{ asset('default-images/handshake.jpg') }}" style="width: 100%; height: 100px;">
                                @endif
                                <div class="overlay">
                                    <h3>{{ $masterService->name }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="row">
                <div class="text-center">
                    {{ $masterServices->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection