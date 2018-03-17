<table class="table table-responsive" id="orderDetails-table">
    <thead>
        <tr>
            <th>Orderid</th>
        <th>Productid</th>
        <th>Quantity</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orderDetails as $orderDetail)
        <tr>
            <td>{!! $orderDetail->orderID !!}</td>
            <td>{!! $orderDetail->productID !!}</td>
            <td>{!! $orderDetail->quantity !!}</td>
            <td>{!! $orderDetail->price !!}</td>
            <td>
                {!! Form::open(['route' => ['orderDetails.destroy', $orderDetail->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orderDetails.show', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orderDetails.edit', [$orderDetail->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>