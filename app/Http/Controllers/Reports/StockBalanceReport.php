<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StockBalanceReport extends Controller
{
    public function loadCurrentBalance(){
        $db=DB::getPDO();
        $sql="SELECT DISTINCT pi.productID,pr.name ,sum(pi.quantity_in)-sum(pi.quantity_out) AS total
            FROM product_inventories pi INNER JOIN products pr WHERE pr.id=pi.productID GROUP BY pi.productID";
        $stockBalance=$db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        return view("reports.current_stock",["stockBalance"=>$stockBalance]);
    }
}
