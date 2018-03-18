<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/03/2018
 * Time: 4:30 PM
 */
?>
@extends("layouts.app")
@section("content")
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
               {!! Form::open(["url"=>"/reports/products/generate","target"=>"_blank","id"=>"generateProductReport"]) !!}

                <div class="form-group">
                    <label>Select Product</label>
                    {!! Form::select("productID",$products,null,["class"=>"form-control"]) !!}
                </div>

                <div class="form-group">
                    <label>Select Format</label>
                    {!! Form::select("reportFormat",$formats,null,["class"=>"form-control"]) !!}
                </div>

                <div class="form-group">
                    <label>Select Start Date:</label>
                    {!! Form::date("startDate",null,["class"=>"form-control","dateFormat"=>"yyy-mm-dd"]) !!}
                </div>

                <div class="form-group">
                    <label>Select End Date:</label>
                    {!! Form::date("endDate",null,["class"=>"form-control","dateFormat"=>"yyy-mm-dd"]) !!}
                </div>

                <div>
                    {!! Form::submit("Generate Report",["class"=>"btn btn-primary"]) !!}
                    <a class="btn btn-default" href="/home">Home</a>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection