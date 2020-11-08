<?php

namespace App\Http\Controllers\Backend\Expenses;

use App\Models\Expenses\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Expenses\CreateResponse;
use App\Http\Responses\Backend\Expenses\EditResponse;
use App\Repositories\Backend\Expenses\ExpenseRepository;
use App\Http\Requests\Backend\Expenses\ManageExpenseRequest;
use App\Http\Requests\Backend\Expenses\CreateExpenseRequest;
use App\Http\Requests\Backend\Expenses\StoreExpenseRequest;
use App\Http\Requests\Backend\Expenses\EditExpenseRequest;
use App\Http\Requests\Backend\Expenses\UpdateExpenseRequest;
use App\Http\Requests\Backend\Expenses\DeleteExpenseRequest;

/**
 * ExpensesController
 */
class ExpensesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpenseRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ExpenseRepository $repository;
     */
    public function __construct(ExpenseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Expenses\ManageExpenseRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageExpenseRequest $request)
    {
        return new ViewResponse('backend.expenses.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateExpenseRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Expenses\CreateResponse
     */
    public function create(CreateExpenseRequest $request)
    {
        return new CreateResponse('backend.expenses.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExpenseRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreExpenseRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.expenses.index'), ['flash_success' => trans('alerts.backend.expenses.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Expenses\Expense  $expense
     * @param  EditExpenseRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Expenses\EditResponse
     */
    public function edit(Expense $expense, EditExpenseRequest $request)
    {
        return new EditResponse($expense);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExpenseRequestNamespace  $request
     * @param  App\Models\Expenses\Expense  $expense
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $expense, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.expenses.index'), ['flash_success' => trans('alerts.backend.expenses.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteExpenseRequestNamespace  $request
     * @param  App\Models\Expenses\Expense  $expense
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Expense $expense, DeleteExpenseRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($expense);
        //returning with successfull message
        return new RedirectResponse(route('admin.expenses.index'), ['flash_success' => trans('alerts.backend.expenses.deleted')]);
    }
    
}
