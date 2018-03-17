<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $order->id !!}</p>
</div>

<!-- Orderref Field -->
<div class="form-group">
    {!! Form::label('orderRef', 'Orderref:') !!}
    <p>{!! $order->orderRef !!}</p>
</div>

<!-- Customerid Field -->
<div class="form-group">
    {!! Form::label('customerID', 'Customerid:') !!}
    <p>{!! $order->customerID !!}</p>
</div>

<!-- Customerphone Field -->
<div class="form-group">
    {!! Form::label('customerPhone', 'Customerphone:') !!}
    <p>{!! $order->customerPhone !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $order->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $order->updated_at !!}</p>
</div>

