<div class="row margin-bottom">
    <div class="form-group">
        <div class="col-lg-3 col-md-3 col-xs-4">
            {{ Form::label('customer_name', 'Customer :') }}
        </div>
        <div class="col-lg-3">
            @if($question->customer_id != null)
                <select id="customer_name"
                        name="customer_id"
                        class="form-control selectpicker show-tick"
                        data-live-search="true"
                        style="width: 100%;">
                    <option value="null">Anonymous</option>
                    @foreach($selectCustomers as $selectCustomer)
                        @if($question->customer_id == $selectCustomer->id)
                            <option value="{{ $selectCustomer->id }}" selected>
                                {{ $selectCustomer->name . '-' . $selectCustomer->phone }}
                            </option>
                        @else
                            <option value="{{ $selectCustomer->id }}">
                                {{ $selectCustomer->name . '-' . $selectCustomer->phone }}
                            </option>
                        @endif
                    @endforeach
                </select>
            @else
                <select id="customer_name"
                        name="customer_id"
                        class="form-control selectpicker show-tick"
                        data-live-search="true"
                        style="width: 100%;">
                    <option value="null" selected>Anonymous</option>
                    @foreach($selectCustomers as $selectCustomer)
                        <option value="{{ $selectCustomer->id }}">
                            {{ $selectCustomer->name . '-' . $selectCustomer->phone }}
                        </option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
</div>

<div class="row margin-bottom">
    <div class="form-group">
        <div class="col-lg-3">
            {{ Form::label('question', 'Customer\'s Question :') }}
        </div>
        <div class="col-lg-7">
            {{ Form::textarea('question', null, ['class' => 'form-control', 'placeholder' => 'Enter customer\'s question' ,'rows' => 3]) }}
        </div>
    </div>
</div>

<div class="row margin-bottom">
    <div class="form-group">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
            {{ Form::label('is_need_call', 'Need Call ? :') }}
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-8">
            @if($question->is_need_call == 1)
                <label class="checkbox-inline">
                    <input name="is_need_call" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" checked>
                </label>
            @else
                <label class="checkbox-inline">
                    <input name="is_need_call" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No">
                </label>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-8">
            {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
        </div>
    </div>
</div>