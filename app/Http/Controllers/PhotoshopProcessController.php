<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoshopProcessRequest;
use App\Http\Requests\UpdatePhotoshopProcessRequest;
use App\Repositories\PhotoshopProcessRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PhotoshopProcessController extends AppBaseController
{
    /** @var  PhotoshopProcessRepository */
    private $photoshopProcessRepository;

    public function __construct(PhotoshopProcessRepository $photoshopProcessRepo)
    {
        $this->photoshopProcessRepository = $photoshopProcessRepo;
    }

    /**
     * Display a listing of the PhotoshopProcess.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->photoshopProcessRepository->pushCriteria(new RequestCriteria($request));
        $photoshopProcesses = $this->photoshopProcessRepository->all();

        return view('photoshop_processes.index')
            ->with('photoshopProcesses', $photoshopProcesses);
    }

    /**
     * Show the form for creating a new PhotoshopProcess.
     *
     * @return Response
     */
    public function create()
    {
        return view('photoshop_processes.create');
    }

    /**
     * Store a newly created PhotoshopProcess in storage.
     *
     * @param CreatePhotoshopProcessRequest $request
     *
     * @return Response
     */
    public function store(CreatePhotoshopProcessRequest $request)
    {
        $input = $request->all();

        $photoshopProcess = $this->photoshopProcessRepository->create($input);

        Flash::success('Photoshop Process saved successfully.');

        return redirect(route('photoshopProcesses.index'));
    }

    /**
     * Display the specified PhotoshopProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $photoshopProcess = $this->photoshopProcessRepository->findWithoutFail($id);

        if (empty($photoshopProcess)) {
            Flash::error('Photoshop Process not found');

            return redirect(route('photoshopProcesses.index'));
        }

        return view('photoshop_processes.show')->with('photoshopProcess', $photoshopProcess);
    }

    /**
     * Show the form for editing the specified PhotoshopProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $photoshopProcess = $this->photoshopProcessRepository->findWithoutFail($id);

        if (empty($photoshopProcess)) {
            Flash::error('Photoshop Process not found');

            return redirect(route('photoshopProcesses.index'));
        }

        return view('photoshop_processes.edit')->with('photoshopProcess', $photoshopProcess);
    }

    /**
     * Update the specified PhotoshopProcess in storage.
     *
     * @param  int              $id
     * @param UpdatePhotoshopProcessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhotoshopProcessRequest $request)
    {
        $photoshopProcess = $this->photoshopProcessRepository->findWithoutFail($id);

        if (empty($photoshopProcess)) {
            Flash::error('Photoshop Process not found');

            return redirect(route('photoshopProcesses.index'));
        }

        $photoshopProcess = $this->photoshopProcessRepository->update($request->all(), $id);

        Flash::success('Photoshop Process updated successfully.');

        return redirect(route('photoshopProcesses.index'));
    }

    /**
     * Remove the specified PhotoshopProcess from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $photoshopProcess = $this->photoshopProcessRepository->findWithoutFail($id);

        if (empty($photoshopProcess)) {
            Flash::error('Photoshop Process not found');

            return redirect(route('photoshopProcesses.index'));
        }

        $this->photoshopProcessRepository->delete($id);

        Flash::success('Photoshop Process deleted successfully.');

        return redirect(route('photoshopProcesses.index'));
    }
}
