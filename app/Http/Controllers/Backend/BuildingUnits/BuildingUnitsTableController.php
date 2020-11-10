<?php

namespace App\Http\Controllers\Backend\BuildingUnits;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\BuildingUnits\BuildingUnitRepository;
use App\Http\Requests\Backend\BuildingUnits\ManageBuildingUnitRequest;

/**
 * Class BuildingUnitsTableController.
 */
class BuildingUnitsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingUnitRepository
     */
    protected $buildingunit;

    /**
     * contructor to initialize repository object
     * @param BuildingUnitRepository $buildingunit;
     */
    public function __construct(BuildingUnitRepository $buildingunit)
    {
        $this->buildingunit = $buildingunit;
    }

    /**
     * This method return the data of the model
     * @param ManageBuildingUnitRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBuildingUnitRequest $request)
    {
        return Datatables::of($this->buildingunit->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($buildingunit) {
                return Carbon::parse($buildingunit->created_at)->toDateString();
            })
            ->addColumn('actions', function ($buildingunit) {
                return $buildingunit->action_buttons;
            })
            ->make(true);
    }
}
