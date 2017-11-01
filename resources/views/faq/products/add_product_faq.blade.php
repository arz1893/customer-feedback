@extends('home')

@section('content-header')
    <h1 class="text-muted">Add FAQ</h1> <br>

    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product_faq', $masterProduct->id) }}"><i class="fa fa-truck"></i> Product FAQ </a></li>
        <li class="active">Add FAQ</li>
    </ol>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-xs-12">
            {{ Form::open(['action' => ['Faq\FaqProductController@storeProductFaq', $masterProduct->id]]) }}
            <div class="form-group">
                {{ Form::label('question', 'Question', ['class' => 'control-label']) }}
                {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Enter your FAQ question']) }}
            </div>
            <div class="form-group">
                {{ Form::label('answer', 'Answer', ['class' => 'control-label']) }}
                {{ Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' => 'Enter your answer to current question']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Add FAQ', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection