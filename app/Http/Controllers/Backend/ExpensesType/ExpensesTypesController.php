<?php

namespace App\Http\Controllers\Backend\ExpensesType;

use App\Models\ExpensesType\ExpensesType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ExpensesType\CreateResponse;
use App\Http\Responses\Backend\ExpensesType\EditResponse;
use App\Repositories\Backend\ExpensesType\ExpensesTypeRepository;
use App\Http\Requests\Backend\ExpensesType\ManageExpensesTypeRequest;
use App\Http\Requests\Backend\ExpensesType\CreateExpensesTypeRequest;
use App\Http\Requests\Backend\ExpensesType\StoreExpensesTypeRequest;
use App\Http\Requests\Backend\ExpensesType\EditExpensesTypeRequest;
use App\Http\Requests\Backend\ExpensesType\UpdateExpensesTypeRequest;
use App\Http\Requests\Backend\ExpensesType\DeleteExpensesTypeRequest;

/**
 * ExpensesTypesController
 */
class ExpensesTypesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpensesTypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ExpensesTypeRepository $repository;
     */
    public function __construct(ExpensesTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ExpensesType\ManageExpensesTypeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageExpensesTypeRequest $request)
    {
        return new ViewResponse('backend.expensestypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateExpensesTypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ExpensesType\CreateResponse
     */
    public function create(CreateExpensesTypeRequest $request)
    {
        return new CreateResponse('backend.expensestypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExpensesTypeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreExpensesTypeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.expensestypes.index'), ['flash_success' => trans('alerts.backend.expensestypes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ExpensesType\ExpensesType  $expensestype
     * @param  EditExpensesTypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ExpensesType\EditResponse
     */
    public function edit(ExpensesType $expensestype, EditExpensesTypeRequest $request)
    {
        return new EditResponse($expensestype);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExpensesTypeRequestNamespace  $request
     * @param  App\Models\ExpensesType\ExpensesType  $expensestype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateExpensesTypeRequest $request, ExpensesType $expensestype)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $expensestype, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.expensestypes.index'), ['flash_success' => trans('alerts.backend.expensestypes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteExpensesTypeRequestNamespace  $request
     * @param  App\Models\ExpensesType\ExpensesType  $expensestype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(ExpensesType $expensestype, DeleteExpensesTypeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($expensestype);
        //returning with successfull message
        return new RedirectResponse(route('admin.expensestypes.index'), ['flash_success' => trans('alerts.backend.expensestypes.deleted')]);
    }
    
}
