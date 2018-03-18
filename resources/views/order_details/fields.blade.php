<!-- Orderid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orderID', 'Order Ref:') !!}
    {!! Form::text('orderID', null, ['class' => 'form-control',"readonly"=>"readonly"]) !!}
</div>

<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Product:') !!}
    {!! Form::text('productID', null, ['class' => 'form-control',"readonly"=>"readonly"]) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orderDetails.index') !!}" class="btn btn-default">Cancel</a>
</div>
