<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/03/2018
 * Time: 9:13 PM
 */
?>
@extends("layouts.app")
@section("content")
    <div class="box box-primary">

        <div class="box-body">
            <table width="100%" class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Current Balance</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($stockBalance as $balance)
                        <tr>
                            <td>{{ $balance["name"] }}</td>
                            <td>{{ number_format($balance["total"],2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
