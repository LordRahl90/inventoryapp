<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/03/2018
 * Time: 4:11 PM
 */
?>
@extends("layouts.app")
@section("css")
    <link rel="stylesheet" href="{{ asset("public/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css") }}" />
@endsection
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
                @yield("inner_content")
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{ asset("public/vendor/moment/min/moment.min.js") }}"></script>
    <script src="{{ asset("public/vendor/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker") }}"></script>


@endsection
