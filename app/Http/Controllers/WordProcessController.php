<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWordProcessRequest;
use App\Http\Requests\UpdateWordProcessRequest;
use App\Repositories\WordProcessRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WordProcessController extends AppBaseController
{
    /** @var  WordProcessRepository */
    private $wordProcessRepository;

    public function __construct(WordProcessRepository $wordProcessRepo)
    {
        $this->wordProcessRepository = $wordProcessRepo;
    }

    /**
     * Display a listing of the WordProcess.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wordProcessRepository->pushCriteria(new RequestCriteria($request));
        $wordProcesses = $this->wordProcessRepository->all();

        return view('word_processes.index')
            ->with('wordProcesses', $wordProcesses);
    }

    /**
     * Show the form for creating a new WordProcess.
     *
     * @return Response
     */
    public function create()
    {
        return view('word_processes.create');
    }

    /**
     * Store a newly created WordProcess in storage.
     *
     * @param CreateWordProcessRequest $request
     *
     * @return Response
     */
    public function store(CreateWordProcessRequest $request)
    {
        $input = $request->all();

        $wordProcess = $this->wordProcessRepository->create($input);

        Flash::success('Word Process saved successfully.');

        return redirect(route('wordProcesses.index'));
    }

    /**
     * Display the specified WordProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wordProcess = $this->wordProcessRepository->findWithoutFail($id);

        if (empty($wordProcess)) {
            Flash::error('Word Process not found');

            return redirect(route('wordProcesses.index'));
        }

        return view('word_processes.show')->with('wordProcess', $wordProcess);
    }

    /**
     * Show the form for editing the specified WordProcess.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wordProcess = $this->wordProcessRepository->findWithoutFail($id);

        if (empty($wordProcess)) {
            Flash::error('Word Process not found');

            return redirect(route('wordProcesses.index'));
        }

        return view('word_processes.edit')->with('wordProcess', $wordProcess);
    }

    /**
     * Update the specified WordProcess in storage.
     *
     * @param  int              $id
     * @param UpdateWordProcessRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWordProcessRequest $request)
    {
        $wordProcess = $this->wordProcessRepository->findWithoutFail($id);

        if (empty($wordProcess)) {
            Flash::error('Word Process not found');

            return redirect(route('wordProcesses.index'));
        }

        $wordProcess = $this->wordProcessRepository->update($request->all(), $id);

        Flash::success('Word Process updated successfully.');

        return redirect(route('wordProcesses.index'));
    }

    /**
     * Remove the specified WordProcess from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wordProcess = $this->wordProcessRepository->findWithoutFail($id);

        if (empty($wordProcess)) {
            Flash::error('Word Process not found');

            return redirect(route('wordProcesses.index'));
        }

        $this->wordProcessRepository->delete($id);

        Flash::success('Word Process deleted successfully.');

        return redirect(route('wordProcesses.index'));
    }
}
