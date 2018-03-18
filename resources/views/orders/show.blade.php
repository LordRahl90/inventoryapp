@extends('layouts.app')
<?php
    $orderDetails=$order->orderDetails;
?>
@section('content')
    <div class="clearfix"></div>
    @include('flash::message')

    <section class="content-header">
        <h1>
            Order
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('orders.show_fields')
                    <a href="{!! route('orders.index') !!}" class="btn btn-default">Back</a>
                    <a href="{!! route('orders.print',["orderRef"=>$order->orderRef]) !!}" class="btn btn-info">Print Invoice</a>
                    <a href="{!! route('orders.process',["orderRef"=>$order->orderRef]) !!}" class="btn btn-success">Process Order</a>
                </div>
            </div>
        </div>
    </div>
@endsection
