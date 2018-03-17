<table class="table table-responsive" id="productSubCategories-table">
    <thead>
        <tr>
            <th>Product Category</th>
            <th>Sub Category</th>
            <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productSubCategories as $productSubCategory)
        <tr>
            <td>{!! $productSubCategory->category->category !!}</td>
            <td>{!! $productSubCategory->sub_category !!}</td>
            <td>{!! $productSubCategory->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['productSubCategories.destroy', $productSubCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productSubCategories.show', [$productSubCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productSubCategories.edit', [$productSubCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>