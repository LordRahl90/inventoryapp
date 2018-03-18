<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Repositories\CustomerRepository;
use App\Repositories\OrderDetailRepository;
use App\Repositories\OrderRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderRepository->pushCriteria(new RequestCriteria($request));
        $orders = $this->orderRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create(ProductRepository $productRepository)
    {
        $productsArray=[""=>"Select Product"];

        $products=$productRepository->orderBy("name","asc")->all();
        foreach ($products as $product){
            $productsArray[$product->id]=$product->name;
        }
        return view('orders.create',[
            "products"=>$productsArray
        ]);
    }

    /**
     *
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     * @param CustomerRepository $customerRepository
     * @param OrderDetailRepository $orderDetailRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(
        CreateOrderRequest $request,
          CustomerRepository $customerRepository,
        OrderDetailRepository $orderDetailRepository)
    {

        dd($request->all());
        DB::beginTransaction();
        try{
            $input = $request->all();
            $customerID=$input["customerID"];

            if($customerID==null){

                $v=Validator::make($input,[
                    "customerPhone"=>"required",
                    "customerFirstname"=>"required",
                    "customerOthernames"=>"required",
                    "customerEmail"=>"required",
                    "customerAddress"=>"required"
                ]);

                if($v->fails()){
                    Flash::error($v->messages()->all());
                    return redirect(route('orders.index'));
                }
                $customerID=$customerRepository->create([
                    "firstname"=>$input["customerFirstname"],
                    "other_names"=>$input["customerOthernames"],
                    "email"=>$input["customerEmail"],
                    "address"=>$input["customerAddress"],
                    "phone"=>$input["customerPhone"]
                ])->id;
            }

            $input["customerID"]=$customerID;
            $input["status"]=false;
            $order = $this->orderRepository->create($input);

            $products=$input["productID"];
            $quantities=$input["quantity"];

            for($i=0; $i<count($products); $i++){
                $product=$products[$i];
                $quantity=$quantities[$i];

                if($product!=null && $quantity!=null){
                    $price=Product::find($product)->price;

                    $orderDetail=$orderDetailRepository->create([
                        "orderID"=>$order->id,
                        "productID"=>$product,
                        "price"=>$price,
                        "quantity"=>$quantity
                    ]);

                    if(!$orderDetail){
                        Log::info("An error occurred While creating an order detail");
                    }
                }
            }

            Flash::success('Order saved successfully.');
        }
        catch(\Exception $ex){
            DB::rollBack();
            dd($ex->getMessage());
            Flash::error("An error occurred");
        }

        DB::commit();
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,ProductRepository $productRepository)
    {
        $order = $this->orderRepository->findWithoutFail($id);
        $productsArray=[""=>"Select Product"];

        $products=$productRepository->orderBy("name","asc")->all();
        foreach ($products as $product){
            $productsArray[$product->id]=$product->name;
        }

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit',["products"=>$productsArray])->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     *
     * @param  int              $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->findWithoutFail($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }
}
