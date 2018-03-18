<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Productid:') !!}
    {!! Form::select('productID', [], null, ['class' => 'form-control']) !!}
</div>

<!-- Inventoryref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inventoryRef', 'Inventoryref:') !!}
    {!! Form::text('inventoryRef', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity_in', 'Quantity In:') !!}
    {!! Form::text('quantity_in', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity_out', 'Quantity Out:') !!}
    {!! Form::text('quantity_out', null, ['class' => 'form-control']) !!}
</div>

<!-- Narration Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('narration', 'Narration:') !!}
    {!! Form::textarea('narration', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productInventories.index') !!}" class="btn btn-default">Cancel</a>
</div>
