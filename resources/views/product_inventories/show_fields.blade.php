<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $productInventory->id !!}</p>
</div>

<!-- Productid Field -->
<div class="form-group">
    {!! Form::label('productID', 'Productid:') !!}
    <p>{!! $productInventory->productID !!}</p>
</div>

<!-- Inventoryref Field -->
<div class="form-group">
    {!! Form::label('inventoryRef', 'Inventoryref:') !!}
    <p>{!! $productInventory->inventoryRef !!}</p>
</div>

<!-- Quantity In Field -->
<div class="form-group">
    {!! Form::label('quantity_in', 'Quantity In:') !!}
    <p>{!! $productInventory->quantity_in !!}</p>
</div>

<!-- Quantity Out Field -->
<div class="form-group">
    {!! Form::label('quantity_out', 'Quantity Out:') !!}
    <p>{!! $productInventory->quantity_out !!}</p>
</div>

<!-- Narration Field -->
<div class="form-group">
    {!! Form::label('narration', 'Narration:') !!}
    <p>{!! $productInventory->narration !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $productInventory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $productInventory->updated_at !!}</p>
</div>

