<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductInventoryRequest;
use App\Http\Requests\UpdateProductInventoryRequest;
use App\Repositories\ProductInventoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductInventoryController extends AppBaseController
{
    /** @var  ProductInventoryRepository */
    private $productInventoryRepository;

    public function __construct(ProductInventoryRepository $productInventoryRepo)
    {
        $this->productInventoryRepository = $productInventoryRepo;
    }

    /**
     * Display a listing of the ProductInventory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->productInventoryRepository->pushCriteria(new RequestCriteria($request));
        $productInventories = $this->productInventoryRepository->all();

        return view('product_inventories.index')
            ->with('productInventories', $productInventories);
    }

    /**
     * Show the form for creating a new ProductInventory.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_inventories.create');
    }

    /**
     * Store a newly created ProductInventory in storage.
     *
     * @param CreateProductInventoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductInventoryRequest $request)
    {
        $input = $request->all();

        $productInventory = $this->productInventoryRepository->create($input);

        Flash::success('Product Inventory saved successfully.');

        return redirect(route('productInventories.index'));
    }

    /**
     * Display the specified ProductInventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productInventory = $this->productInventoryRepository->findWithoutFail($id);

        if (empty($productInventory)) {
            Flash::error('Product Inventory not found');

            return redirect(route('productInventories.index'));
        }

        return view('product_inventories.show')->with('productInventory', $productInventory);
    }

    /**
     * Show the form for editing the specified ProductInventory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productInventory = $this->productInventoryRepository->findWithoutFail($id);

        if (empty($productInventory)) {
            Flash::error('Product Inventory not found');

            return redirect(route('productInventories.index'));
        }

        return view('product_inventories.edit')->with('productInventory', $productInventory);
    }

    /**
     * Update the specified ProductInventory in storage.
     *
     * @param  int              $id
     * @param UpdateProductInventoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductInventoryRequest $request)
    {
        $productInventory = $this->productInventoryRepository->findWithoutFail($id);

        if (empty($productInventory)) {
            Flash::error('Product Inventory not found');

            return redirect(route('productInventories.index'));
        }

        $productInventory = $this->productInventoryRepository->update($request->all(), $id);

        Flash::success('Product Inventory updated successfully.');

        return redirect(route('productInventories.index'));
    }

    /**
     * Remove the specified ProductInventory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productInventory = $this->productInventoryRepository->findWithoutFail($id);

        if (empty($productInventory)) {
            Flash::error('Product Inventory not found');

            return redirect(route('productInventories.index'));
        }

        $this->productInventoryRepository->delete($id);

        Flash::success('Product Inventory deleted successfully.');

        return redirect(route('productInventories.index'));
    }
}
