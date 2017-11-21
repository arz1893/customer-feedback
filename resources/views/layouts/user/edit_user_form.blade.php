<div class="row">
    <div class="col-lg-10 col-md-12">
        <div class="form-group">
            {{ Form::label('name', 'Name *', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'User\'s name']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="form-group">
            {{ Form::label('phone', 'Phone number', ['class' => 'control-label']) }}
            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'User\'s phone number']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="form-group">
            {{ Form::label('user_type_id', 'Select Type *', ['class' => 'control-label']) }}
            {{ Form::select('user_type_id', $userTypes, null, ['class' => 'form-control', 'placeholder' => 'Select Type']) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12">
        <button type="submit" class="btn btn-primary">
            {{ $submitButtonText }} <i class="fa fa-user-plus"></i>
        </button>
    </div>
</div>