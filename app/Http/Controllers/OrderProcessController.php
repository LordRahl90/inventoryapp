<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\ProductInventoryRepository;
use ConsoleTVs\Invoices\Classes\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laracasts\Flash\Flash;

class OrderProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function print($orderRef,OrderRepository $orderRepository){
        $order=$orderRepository->findWhere(["orderRef"=>$orderRef])->first();

        if($order==null){
            Flash::error("Order Not found");
            return redirect()->back();
        }

        $invoice=Invoice::make();
        $customer=$order->customer;

        foreach ($order->orderDetails as $detail){
            $invoice->addItem($detail->product->name,$detail->product->price,$detail->quantity,$detail->id);
        }

        $invoice->number($order->orderRef)
        ->customer([
            "name"=>$customer->firstname.' '.$customer->other_names,
            "id"=>$customer->id,
            "phone"=>$customer->phone,
            "location"=>$customer->address,
            "country"=>"Nigeria",
        ]);

        $invoice->download(uniqid());
    }


    public function process($orderRef,
        OrderRepository $orderRepository,
        ProductInventoryRepository $inventoryRepository){
        $order=$orderRepository->findWhere(["orderRef"=>$orderRef])->first();

        $details=$order->orderDetails;
        DB::beginTransaction();

        try{
            if($order==null){
                Flash::error("Order Not found");
                throw new \Exception("Order Not Found");
            }

            if($order->status){
                Flash::error("This Transaction has been processed earlier");
                throw new \Exception("Transaction has been posted earlier");
            }


            if(count($details)>0){
                foreach ($details as $detail){
                    $inventoryRecord=$inventoryRepository->create([
                        "productID"=>$detail->productID,
                        "inventoryRef"=>$order->orderRef,
                        "quantity_in"=>0,
                        "quantity_out"=>$detail->quantity,
                        "narration"=>$order->customer->firstnme." ".$order->customer->other_names
                    ]);

                    if(!$inventoryRecord){
                        Flash::error("An error occurred...");
                        throw new \Exception("Cannot Process this order... Entry error...");
                    }
                }
            }

            $order->status=true;
            $orderUpdate=$order->save();

            if(!$orderUpdate){
                throw new \Exception("Cannot Update your order");
            }

            DB::commit();
        }
        catch(\Exception $ex){
            Log::info($ex->getMessage());
            DB::rollback();
        }

        return redirect(route('orders.index'));
    }
}
