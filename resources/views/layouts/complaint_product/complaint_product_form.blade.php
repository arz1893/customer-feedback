<div class="form-group">
    {{ Form::label('customer_id', 'Customer') }}
    {{ Form::select('customer_id', $customers, null, ['class' => 'form-control', 'placeholder' => 'Anonymous']) }}
</div>
<div class="form-group">
    {{ Form::label('', 'Customer Satisfaction') }} <br>
    <a class="smiley_rating">
        <i class="large material-icons">sentiment_very_dissatisfied</i>
    </a>
    <a class="smiley_rating">
        <i class="large material-icons">sentiment_dissatisfied</i>
    </a>
    <a class="smiley_rating">
        <i class="large material-icons">sentiment_neutral</i>
    </a>
    <a class="smiley_rating">
        <i class="large material-icons">sentiment_satisfied</i>
    </a>
    <a class="smiley_rating">
        <i class="large material-icons">sentiment_very_satisfied</i>
    </a>
</div>
<div class="form-group">
    {{ Form::label('customer_complaint', 'Complaint') }}
    {{ Form::textarea('customer_complaint', null, ['class' => 'form-control', 'placeholder' => 'Please enter customer\'s complaint', 'rows' => 6]) }}
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="form-group">
            <label>
                {{ Form::checkbox('is_need_call') }}
                {{--<input type="checkbox" class="icheck-input" name="is_need_call" id="is_need_call" value="1">--}}
                Need Call ?
            </label>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <div class="form-group">
            <label>
                {{ Form::checkbox('is_urgent') }}
                {{--<input type="checkbox" class="icheck-input" name="is_urgent" id="is_urgent" value="1">--}}
                Is Urgent ?
            </label>
        </div>
    </div>
</div>