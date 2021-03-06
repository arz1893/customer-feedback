<div class="container">
    <div class="col-md-6">
        <div class="col-md-11">
            <div class="form-group">
                {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Your Product Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description',['class' => 'control-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Your Product\'s Description']) }}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-11">
            <div class="form-group">
                {{ Form::label('specification', 'Specification',['class' => 'control-label']) }}
                {{ Form::textarea('specification', null, ['class' => 'form-control', 'placeholder' => 'Enter Your Product\'s Specification']) }}
            </div>
            <div class="form-group">
                <label for="image_cover">Choose image</label>
                <input type="file" accept="image/*" class="form-control-file" name="image_cover" id="image_cover" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Choose your product's image</small>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Product
            </button>
        </div>
    </div>
</div>