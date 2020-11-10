<?php

namespace App\Http\Controllers\Backend\ExpensesType;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ExpensesType\ExpensesTypeRepository;
use App\Http\Requests\Backend\ExpensesType\ManageExpensesTypeRequest;

/**
 * Class ExpensesTypesTableController.
 */
class ExpensesTypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ExpensesTypeRepository
     */
    protected $expensestype;

    /**
     * contructor to initialize repository object
     * @param ExpensesTypeRepository $expensestype;
     */
    public function __construct(ExpensesTypeRepository $expensestype)
    {
        $this->expensestype = $expensestype;
    }

    /**
     * This method return the data of the model
     * @param ManageExpensesTypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageExpensesTypeRequest $request)
    {
        return Datatables::of($this->expensestype->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($expensestype) {
                return Carbon::parse($expensestype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($expensestype) {
                return $expensestype->action_buttons;
            })
            ->make(true);
    }
}
