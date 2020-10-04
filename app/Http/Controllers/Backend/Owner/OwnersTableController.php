<?php

namespace App\Http\Controllers\Backend\Owner;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Owner\OwnerRepository;
use App\Http\Requests\Backend\Owner\ManageOwnerRequest;

/**
 * Class OwnersTableController.
 */
class OwnersTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var OwnerRepository
     */
    protected $owner;

    /**
     * contructor to initialize repository object
     * @param OwnerRepository $owner;
     */
    public function __construct(OwnerRepository $owner)
    {
        $this->owner = $owner;
    }

    /**
     * This method return the data of the model
     * @param ManageOwnerRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOwnerRequest $request)
    {
        return Datatables::of($this->owner->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($owner) {
                return Carbon::parse($owner->created_at)->toDateString();
            })
            ->addColumn('actions', function ($owner) {
                return $owner->action_buttons;
            })
            ->make(true);
    }
}
