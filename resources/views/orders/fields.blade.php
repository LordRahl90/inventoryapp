<!-- Orderref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderRef', 'Orderref:') !!}
    {!! Form::text('orderRef', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerID', 'Customer:') !!}
    {!! Form::select('customerID', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Customerphone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerPhone', 'Customerphone:') !!}
    {!! Form::text('customerPhone', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>
