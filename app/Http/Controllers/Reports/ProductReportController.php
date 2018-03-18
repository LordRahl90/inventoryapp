<?php

namespace App\Http\Controllers\Reports;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Pdf;

class ProductReportController extends Controller
{
    public function loadView(ProductRepository $productRepository){

        $productsArray=[""=>"Select Product"];
        $products=$productRepository->orderBy("name","asc")->all();
        foreach ($products as $product){
            $productsArray[$product->id]=$product->name;
        }

        $formats=["PDF","Excel"];

        return view("reports.products",
            [
                "products"=>$productsArray,
                "formats"=>$formats
            ]
        );
    }


    public function generateReport(){
        $productID=Input::get("productID");
        $format=Input::get("reportFormat");
        $startDate=Input::get("startDate")." 00:00:00";
        $endDate=Input::get("endDate")." 23:59:59";

        $db=DB::getPDO();

        $sql="SELECT pr.name as productName,pi.productID,pi.quantity_in, pi.quantity_out, pi.created_at, @balance := @balance + pi.quantity_in - pi.quantity_out AS balance
              FROM (product_inventories pi INNER JOIN products pr on pr.id=pi.productID),(SELECT @balance := 0) bl 
              WHERE productID=".$productID." AND pi.created_at BETWEEN '".$startDate."' AND '".$endDate."' ";
            $result=$db->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

        $inputData=json_encode([
            "startDate"=>$startDate,
            "endDate"=>$endDate,
            "productID"=>$productID
        ]);

        if(count($result)<=0){
            dd("There has been nooperation thus far");
        }

        if($format==0){
            //go to pdf page
            return $this->generatePDF($inputData,json_encode($result));

        }
        else{
            //generate excel file.
            return $this->generateExcelFile($inputData,json_encode($result));
        }
    }


    public function generateExcelFile($inputData,$reportData){
        $inputData=json_decode($inputData);
        $product=Product::find($inputData->productID);

        Excel::create(uniqid("EXL"),function($excel) use ($reportData,$product,$inputData){
            $excel->sheet(str_slug($product->name), function($sheet) use($reportData, $product,$inputData){
                $sheet->mergeCells("A1:D1");
                $sheet->cell("A1", function($cell){
                    $cell->setAlignment("center");
                    $cell->setValue("CardinalStone Partners");
                });

                $sheet->mergeCells("A2:D2");
                $sheet->cell("A2", function($cell) use($product){
                    $cell->setAlignment("center");
                    $cell->setValue("Report For ".$product->name);
                });

                $sheet->mergeCells("A3:D3");
                $sheet->cell("A3", function($cell) use ($inputData){
                    $cell->setAlignment("center");
                    $cell->setValue("Between ".Date("Y-m-d",strtotime($inputData->startDate))." and ".Date("Y-m-d",strtotime($inputData->startDate)));
                });

                $rowCount=5;

                $sheet->row($rowCount,[
                    "Date",
                    "Quantity IN",
                    "Quantity Out",
                    "Balance"
                ]);

                $rowCount++;
                $total=0;
                $reportData=json_decode($reportData);
                foreach ($reportData as $data){

                    $sheet->row($rowCount,[
                        Date("Y-m-d",strtotime($data->created_at)),
                        $data->quantity_in,
                        $data->quantity_out,
                        $data->balance
                    ]);

                    $rowCount++;
                    $total=$data->balance;
                }

                $sheet->mergeCells("A$rowCount:D$rowCount");
                $sheet->cell("A".$rowCount, function($cell){
                    $cell->setFontWeight("bold");
                    $cell->setAlignment("right");
                    $cell->setValue("Total:");
                });
                $sheet->cell("D".$rowCount,function($cell) use($total){
                    $cell->setValue($total)->setFontWeight("bold");
                });

            });
        })->download("xlsx");
    }


    public function generatePDF($inputData,$reportData){
        $inputData=json_decode($inputData);
        $product=Product::find($inputData->productID);

        $data=[
            "startDate"=>$inputData->startDate,
            "endDate"=>$inputData->endDate,
            "product"=>$product,
            "reportData"=>json_decode($reportData)
        ];

        $pdf=\niklasravnsborg\LaravelPdf\Facades\Pdf::loadView("reports.pdf.products",$data);
        return $pdf->stream(uniqid("DOC").".pdf");
    }
}