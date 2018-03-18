<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductProcurementRequest;
use App\Http\Requests\UpdateProductProcurementRequest;
use App\Repositories\ProductInventoryRepository;
use App\Repositories\ProductProcurementRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductProcurementController extends AppBaseController
{
    /** @var  ProductProcurementRepository */
    private $productProcurementRepository;

    public function __construct(ProductProcurementRepository $productProcurementRepo)
    {
        $this->productProcurementRepository = $productProcurementRepo;
    }

    /**
     * Display a listing of the ProductProcurement.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productProcurementRepository->pushCriteria(new RequestCriteria($request));
        $productProcurements = $this->productProcurementRepository->all();

        return view('product_procurements.index')
            ->with('productProcurements', $productProcurements);
    }

    /**
     * Show the form for creating a new ProductProcurement.
     *
     * @return Response
     */
    public function create(ProductRepository $productRepository)
    {
        $productsArray=[""=>"Select Product"];
        $products=$productRepository->orderBy("name","asc")->get();

        foreach ($products as $product){
            $productsArray[$product->id]=$product->name;
        }

        return view('product_procurements.create',["products"=>$productsArray]);
    }

    /**
     * Store a newly created ProductProcurement in storage.
     *
     * @param CreateProductProcurementRequest $request
     * @param ProductInventoryRepository $inventoryRepository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateProductProcurementRequest $request, ProductInventoryRepository $inventoryRepository)
    {
        DB::beginTransaction();

        try{
            $input = $request->all();

            $productProcurement = $this->productProcurementRepository->create($input);

            //add this process to the inventory as well.
            $inventoryRecord=$inventoryRepository->create([
                "productID"=>$input["productID"],
                "inventoryRef"=>$input["documentRef"],
                "quantity_in"=>0,
                "quantity_out"=>$input["quantity"],
                "narration"=>$input["narration"]
            ]);

            if(!$inventoryRecord){
                Flash::error("An error occurred...");
                throw new \Exception("Cannot Process this order... Entry error...");
            }

            Flash::success('Product Procurement saved successfully.');

            DB::commit();
        }
        catch(\Exception $ex){
            DB::rollBack();
            Log::info($ex->getMessage());
        }
        return redirect(route('productProcurements.index'));
    }

    /**
     * Display the specified ProductProcurement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productProcurement = $this->productProcurementRepository->findWithoutFail($id);

        if (empty($productProcurement)) {
            Flash::error('Product Procurement not found');

            return redirect(route('productProcurements.index'));
        }

        return view('product_procurements.show')->with('productProcurement', $productProcurement);
    }

    /**
     * Show the form for editing the specified ProductProcurement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productProcurement = $this->productProcurementRepository->findWithoutFail($id);

        if (empty($productProcurement)) {
            Flash::error('Product Procurement not found');

            return redirect(route('productProcurements.index'));
        }

        return view('product_procurements.edit')->with('productProcurement', $productProcurement);
    }

    /**
     * Update the specified ProductProcurement in storage.
     *
     * @param  int              $id
     * @param UpdateProductProcurementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductProcurementRequest $request)
    {
        $productProcurement = $this->productProcurementRepository->findWithoutFail($id);

        if (empty($productProcurement)) {
            Flash::error('Product Procurement not found');

            return redirect(route('productProcurements.index'));
        }

        $productProcurement = $this->productProcurementRepository->update($request->all(), $id);

        Flash::success('Product Procurement updated successfully.');

        return redirect(route('productProcurements.index'));
    }

    /**
     * Remove the specified ProductProcurement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productProcurement = $this->productProcurementRepository->findWithoutFail($id);

        if (empty($productProcurement)) {
            Flash::error('Product Procurement not found');

            return redirect(route('productProcurements.index'));
        }

        $this->productProcurementRepository->delete($id);

        Flash::success('Product Procurement deleted successfully.');

        return redirect(route('productProcurements.index'));
    }
}
