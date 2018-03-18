<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $productSubCategory->id !!}</p>
</div>

<!-- Product Category Id Field -->
<div class="form-group">
    {!! Form::label('product_category_id', 'Product Category Id:') !!}
    <p>{!! $productSubCategory->product_category_id !!}</p>
</div>

<!-- Sub Category Field -->
<div class="form-group">
    {!! Form::label('sub_category', 'Sub Category:') !!}
    <p>{!! $productSubCategory->sub_category !!}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{!! $productSubCategory->slug !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $productSubCategory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $productSubCategory->updated_at !!}</p>
</div>

