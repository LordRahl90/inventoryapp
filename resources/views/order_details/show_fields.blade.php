<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $orderDetail->id !!}</p>
</div>

<!-- Orderid Field -->
<div class="form-group">
    {!! Form::label('orderID', 'Orderid:') !!}
    <p>{!! $orderDetail->orderID !!}</p>
</div>

<!-- Productid Field -->
<div class="form-group">
    {!! Form::label('productID', 'Productid:') !!}
    <p>{!! $orderDetail->productID !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $orderDetail->quantity !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $orderDetail->price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $orderDetail->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $orderDetail->updated_at !!}</p>
</div>

