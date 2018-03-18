<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/03/2018
 * Time: 8:08 PM
 */
?>
<h1 align="center">CardinalStone&trade; Partners</h1>
<h3 align="center">Report For {{ $product->name }}</h3>
<h4 align="center">Dates Between {{ Date('Y-m-d',strtotime($startDate)) }} and {{ Date('Y-m-d',strtotime($endDate)) }}</h4>

<table width="100%">
    <thead>
        <tr>
            <td style="font-weight:bold">Date</td>
            <td style="font-weight:bold" align="right">Quantity IN</td>
            <td style="font-weight:bold" align="right">Quantity Out</td>
            <td style="font-weight:bold" align="right">Balance</td>
        </tr>
    </thead>

    <tbody>
        @foreach($reportData as $data)
            <?php
                $total=$data->balance;
            ?>
            <tr>
                <td>{{ Date("y-m-d",strtotime($data->created_at)) }}</td>
                <td align="right">{{ $data->quantity_in  }}</td>
                <td align="right">{{ $data->quantity_out  }}</td>
                <td align="right">{{ $data->balance  }}</td>
            </tr>
        @endforeach

        <tr>
            <td align="right" colspan="3" style="font-weight:bold">Total:</td>
            <td align="right" style="font-weight:bold">{{ $total }}</td>
        </tr>
    </tbody>
</table>