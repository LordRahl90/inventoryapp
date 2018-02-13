<?php

namespace App\Http\Controllers\Listings;

use App\Repositories\ProductListingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Merchant;
use App\Models\Admin\ItemClass;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use InfyOm\Generator\Utils\ResponseUtil;

class ListingController extends Controller
{
    public function index(){
        return view("listings.index");
    }

    public function create(){
        $merchantArray=[""=>"Select Merchant"];
        $classArray=[""=>"Select Class"];

        $merchants=Merchant::all();
        foreach ($merchants as $merchant){
            $merchantArray[$merchant->id]=$merchant->store_name;
        }

        $classes=ItemClass::all();
        foreach ($classes as $class){
            $classArray[$class->id]=$class->item;
        }
        return view("listings.create",[
            "classes"=>$classArray,
            "merchants"=>$merchantArray
        ]);
    }

    public function store(ProductListingRepository $productListing){
        //sanitize user input

        $opType=Input::get("opType");

        if($opType==="productInfo"){
            $payload=[
                "sub_category_id"=>Input::get("sub_category_id"),
                "merchant_id"=>Input::get("merchant_id"),
                "title"=>Input::get("title"),
                "overview"=>Input::get("overview"),
                "quantity"=>Input::get("quantity"),
                "amount"=>Input::get("amount"),
                "discount"=>Input::get("discount")??0
            ];

            if(Input::get("checker_id")!=""){
                //we update the record at this point
                $newProduct=$productListing->update($payload,Input::get("checker_id"));
            }else{
                $newProduct=$productListing->create($payload);
            }

            if(!$newProduct){
                return response()->json(ResponseUtil::makeError("An error occurred while creating this product"));
            }

            return response()->json(ResponseUtil::makeResponse("Product Created Successfully...",$newProduct));
        }
//        else if(){
//
//        }


    }
}
