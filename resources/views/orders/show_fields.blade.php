<div class="col-md-12">
    <div class="col-md-4">
        <!-- Id Field -->
        <div class="form-group">
            {!! Form::label('id', 'Id:') !!}
            <p>{!! $order->id !!}</p>
        </div>

        <!-- Orderref Field -->
        <div class="form-group">
            {!! Form::label('orderRef', 'Orderref:') !!}
            <p>{!! $order->orderRef !!}</p>
        </div>

        <!-- Customerid Field -->
        <div class="form-group">
            {!! Form::label('customerID', 'Customerid:') !!}
            <p>{!! $order->customerID !!}</p>
        </div>

        <!-- Customerphone Field -->
        <div class="form-group">
            {!! Form::label('customerPhone', 'Customerphone:') !!}
            <p>{!! $order->customerPhone !!}</p>
        </div>

        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Created At:') !!}
            <p>{!! $order->created_at !!}</p>
        </div>

        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Updated At:') !!}
            <p>{!! $order->updated_at !!}</p>
        </div>
    </div>
    <div class="col-md-8">
        <h1>Order Details</h1>
        <table class="table table-responsive" id="orderDetails-table">
            <thead>
            <tr>
                <th>Order Ref</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>{!! $orderDetail->order->orderRef !!}</td>
                    <td>{!! $orderDetail->product->name !!}</td>
                    <td>{!! $orderDetail->quantity !!}</td>
                    <td>&#x20A6;{!! number_format($orderDetail->price,2) !!}</td>
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
    </div>
</div>