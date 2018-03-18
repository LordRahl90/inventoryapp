<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Product Sub Category</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->sub_category->sub_category !!}</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->slug !!}</td>
            <td>{!! $product->description !!}</td>
            <td>&#x20A6;{!! number_format($product->price,2) !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>