<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('name', 'Product Name') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter your product name']) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter your product description']) }}
        </div>
        <div class="form-group">
            {{ Form::label('specification', 'Specification') }}
            {{ Form::textarea('specification', null, ['class' => 'form-control', 'placeholder' => 'Enter your product specification']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Update Product', ['class' => 'btn btn-primary form-control']) }}
        </div>
    </div>
</div>