<!-- Orderref Field -->
<input type="hidden" name="customerID" id="customerID" class="customerID" value="" />
<div class="form-group col-sm-6">
    {!! Form::label('orderRef', 'Order Ref:') !!}
    {!! Form::text('orderRef', strtoupper(uniqid("OR")), ['class' => 'form-control','readonly'=>'readonly']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('customerPhone', 'Customer Phone:') !!}
    {!! Form::text('customerPhone', null, ['class' => 'form-control']) !!}
</div>


<div id="customerInformation" style="display: block;">
    <!-- Customerid Firstname -->
    <div class="form-group col-sm-6">
        {!! Form::label('customerFirstname', 'Customer Firstname:') !!}
        {!! Form::text('customerFirstname', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Customerid Othernames -->
    <div class="form-group col-sm-6">
        {!! Form::label('customerOthernames', 'Customer Othernames:') !!}
        {!! Form::text('customerOthernames', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Customerid EMail -->
    <div class="form-group col-sm-6">
        {!! Form::label('customerEmail', 'Customer Email:') !!}
        {!! Form::text('customerEmail', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Customerid Address -->
    <div class="form-group col-sm-6">
        {!! Form::label('customerAddress', 'Customer Address:') !!}
        {!! Form::textarea('customerAddress', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Order Fields -->

<hr />
<div id="orderContent">
    <div class="col-sm-12">
        <div class="form-group col-sm-4">
            {!! Form::label("productID","Select Product") !!}
            {!! Form::select("productID[]",$products,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('quantity', 'Quantity:') !!}
            {!! Form::text('quantity[]', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            <label class="item-total"></label>
        </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::button("Add One More Product",["class"=>"btn btn-default","id"=>"addMoreOrderDetail"]) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>


<div id="moreOrders" style="display: none;" >
    <div class="col-sm-12">
        <div class="form-group col-sm-4">
            {!! Form::label("productID","Select Product") !!}
            {!! Form::select("productID[]",$products,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('quantity', 'Quantity:') !!}
            {!! Form::text('quantity[]', null, ['class' => 'form-control quantity']) !!}
        </div>

        <div class="form-group col-sm-4">
            <label class="item-total"></label>
        </div>
    </div>
</div>