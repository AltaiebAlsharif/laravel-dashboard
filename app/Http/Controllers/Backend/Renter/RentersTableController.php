<?php

namespace App\Http\Controllers\Backend\Renter;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Renter\RenterRepository;
use App\Http\Requests\Backend\Renter\ManageRenterRequest;

/**
 * Class RentersTableController.
 */
class RentersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RenterRepository
     */
    protected $renter;

    /**
     * contructor to initialize repository object
     * @param RenterRepository $renter;
     */
    public function __construct(RenterRepository $renter)
    {
        $this->renter = $renter;
    }

    /**
     * This method return the data of the model
     * @param ManageRenterRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRenterRequest $request)
    {
        return Datatables::of($this->renter->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($renter) {
                return Carbon::parse($renter->created_at)->toDateString();
            })
            ->addColumn('actions', function ($renter) {
                return $renter->action_buttons;
            })
            ->make(true);
    }
}
