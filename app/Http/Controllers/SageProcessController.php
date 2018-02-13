<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSageProcessRequest;
use App\Http\Requests\UpdateSageProcessRequest;
use App\Repositories\SageProcessRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SageProcessController extends AppBaseController
{
    /** @var  SageProcessRepository */
    private $sageProcessRepository;

    public function __construct(SageProcessRepository $sageProcessRepo)
    {
        $this->sageProcessRepository = $sageProcessRepo;
    }

    /**
     * Display a listing of the SageProcess.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sageProcessRepository->pushCriteria(new RequestCriteria($request));
        $sageProcesses = $this->sageProcessRepository->all();

        return view('sage_processes.index')
            ->with('sageProcesses', $sageProcesses);
    }

    /**
     * Show the form for creating a new SageProcess.
     *
     * @return Response
     */
    public function create()
    {
        return view('sage_processes.create');
    }

    /**
     * Store a newly created SageProcess in storage.
     *
     * @param CreateSageProcessRequest $request
     *
     * @return Response
     */
    public function store(CreateSageProcessRequest $request)
    {
        $input = $request->all();

        $sageProcess = $this->sageProcessRepository->create($input);

        Flash::success('Sage Process saved successfully.');

        return redirect(route('sageProcesses.index'));
    }

    /**
     * Display the specified SageProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sageProcess = $this->sageProcessRepository->findWithoutFail($id);

        if (empty($sageProcess)) {
            Flash::error('Sage Process not found');

            return redirect(route('sageProcesses.index'));
        }

        return view('sage_processes.show')->with('sageProcess', $sageProcess);
    }

    /**
     * Show the form for editing the specified SageProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sageProcess = $this->sageProcessRepository->findWithoutFail($id);

        if (empty($sageProcess)) {
            Flash::error('Sage Process not found');

            return redirect(route('sageProcesses.index'));
        }

        return view('sage_processes.edit')->with('sageProcess', $sageProcess);
    }

    /**
     * Update the specified SageProcess in storage.
     *
     * @param  int              $id
     * @param UpdateSageProcessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSageProcessRequest $request)
    {
        $sageProcess = $this->sageProcessRepository->findWithoutFail($id);

        if (empty($sageProcess)) {
            Flash::error('Sage Process not found');

            return redirect(route('sageProcesses.index'));
        }

        $sageProcess = $this->sageProcessRepository->update($request->all(), $id);

        Flash::success('Sage Process updated successfully.');

        return redirect(route('sageProcesses.index'));
    }

    /**
     * Remove the specified SageProcess from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sageProcess = $this->sageProcessRepository->findWithoutFail($id);

        if (empty($sageProcess)) {
            Flash::error('Sage Process not found');

            return redirect(route('sageProcesses.index'));
        }

        $this->sageProcessRepository->delete($id);

        Flash::success('Sage Process deleted successfully.');

        return redirect(route('sageProcesses.index'));
    }
}
