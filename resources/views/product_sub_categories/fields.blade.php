<!-- Product Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_category_id', 'Select Category:') !!}
    {!! Form::select('product_category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_category', 'Sub Category:') !!}
    {!! Form::text('sub_category', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('productSubCategories.index') !!}" class="btn btn-default">Cancel</a>
</div>
