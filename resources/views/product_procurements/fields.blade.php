<!-- Productid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productID', 'Productid:') !!}
    {!! Form::select('productID', $products, null, ['class' => 'form-control']) !!}
</div>

<!-- Documentref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documentRef', 'Documentref:') !!}
    {!! Form::text('documentRef', null, ['class' => 'form-control']) !!}
</div>

<!-- Narration Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('narration', 'Narration:') !!}
    {!! Form::textarea('narration', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('productProcurements.index') !!}" class="btn btn-default">Cancel</a>
</div>
