@extends('home')

@section('content-header')

    <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('product_faq', $masterProduct->id) }}"><i class="fa fa-truck"></i> Product FAQ </a></li>
        <li class="active">Edit FAQ</li>
    </ol>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-xs-12">
            {{ Form::model($faqProduct, ['method' => 'PATCH', 'action' => ['Faq\FaqProductController@updateProductFaq', $faqProduct->id]]) }}
                <div class="form-group">
                    {{ Form::label('question', 'Question', ['class' => 'control-label']) }}
                    {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Enter your FAQ question']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('answer', 'Answer', ['class' => 'control-label']) }}
                    {{ Form::textarea('answer', null, ['class' => 'form-control', 'placeholder' => 'Enter your answer to current question']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Update Product FAQ', ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection