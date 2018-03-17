<table class="table table-responsive" id="productInventories-table">
    <thead>
        <tr>
            <th>Productid</th>
        <th>Inventoryref</th>
        <th>Quantity In</th>
        <th>Quantity Out</th>
        <th>Narration</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productInventories as $productInventory)
        <tr>
            <td>{!! $productInventory->productID !!}</td>
            <td>{!! $productInventory->inventoryRef !!}</td>
            <td>{!! $productInventory->quantity_in !!}</td>
            <td>{!! $productInventory->quantity_out !!}</td>
            <td>{!! $productInventory->narration !!}</td>
            <td>
                {!! Form::open(['route' => ['productInventories.destroy', $productInventory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productInventories.show', [$productInventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productInventories.edit', [$productInventory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>