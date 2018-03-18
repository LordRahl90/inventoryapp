<table class="table table-responsive" id="productProcurements-table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Document Ref</th>
            <th>Narration</th>
            <th>Quantity</th>
            <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productProcurements as $productProcurement)
        <tr>
            <td>{!! $productProcurement->product->name !!}</td>
            <td>{!! $productProcurement->documentRef !!}</td>
            <td>{!! $productProcurement->narration !!}</td>
            <td>{!! $productProcurement->quantity !!}</td>
            <td>{!! $productProcurement->price !!}</td>
            <td>
                {!! Form::open(['route' => ['productProcurements.destroy', $productProcurement->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productProcurements.show', [$productProcurement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('productProcurements.edit', [$productProcurement->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>