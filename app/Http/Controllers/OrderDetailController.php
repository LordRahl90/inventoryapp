<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Repositories\OrderDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrderDetailController extends AppBaseController
{
    /** @var  OrderDetailRepository */
    private $orderDetailRepository;

    public function __construct(OrderDetailRepository $orderDetailRepo)
    {
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the OrderDetail.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->orderDetailRepository->pushCriteria(new RequestCriteria($request));
        $orderDetails = $this->orderDetailRepository->all();

        return view('order_details.index')
            ->with('orderDetails', $orderDetails);
    }

    /**
     * Show the form for creating a new OrderDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_details.create');
    }

    /**
     * Store a newly created OrderDetail in storage.
     *
     * @param CreateOrderDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderDetailRequest $request)
    {
        $input = $request->all();

        $orderDetail = $this->orderDetailRepository->create($input);

        Flash::success('Order Detail saved successfully.');

        return redirect(route('orderDetails.index'));
    }

    /**
     * Display the specified OrderDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        return view('order_details.show')->with('orderDetail', $orderDetail);
    }

    /**
     * Show the form for editing the specified OrderDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        return view('order_details.edit')->with('orderDetail', $orderDetail);
    }

    /**
     * Update the specified OrderDetail in storage.
     *
     * @param  int              $id
     * @param UpdateOrderDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderDetailRequest $request)
    {
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        $orderDetail = $this->orderDetailRepository->update($request->all(), $id);

        Flash::success('Order Detail updated successfully.');

        return redirect(route('orderDetails.index'));
    }

    /**
     * Remove the specified OrderDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderDetail = $this->orderDetailRepository->findWithoutFail($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        $this->orderDetailRepository->delete($id);

        Flash::success('Order Detail deleted successfully.');

        return redirect(route('orderDetails.index'));
    }
}
