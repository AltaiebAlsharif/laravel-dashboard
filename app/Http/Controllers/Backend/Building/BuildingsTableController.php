<?php

namespace App\Http\Controllers\Backend\Building;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Building\BuildingRepository;
use App\Http\Requests\Backend\Building\ManageBuildingRequest;

/**
 * Class BuildingsTableController.
 */
class BuildingsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingRepository
     */
    protected $building;

    /**
     * contructor to initialize repository object
     * @param BuildingRepository $building;
     */
    public function __construct(BuildingRepository $building)
    {
        $this->building = $building;
    }

    /**
     * This method return the data of the model
     * @param ManageBuildingRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBuildingRequest $request)
    {
        return Datatables::of($this->building->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($building) {
                return Carbon::parse($building->created_at)->toDateString();
            })
            ->addColumn('actions', function ($building) {
                return $building->action_buttons;
            })
            ->make(true);
    }
}
