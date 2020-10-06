<?php

namespace App\Http\Controllers\Backend\BuildingType;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\BuildingType\BuildingTypeRepository;
use App\Http\Requests\Backend\BuildingType\ManageBuildingTypeRequest;

/**
 * Class BuildingTypesTableController.
 */
class BuildingTypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingTypeRepository
     */
    protected $buildingtype;

    /**
     * contructor to initialize repository object
     * @param BuildingTypeRepository $buildingtype;
     */
    public function __construct(BuildingTypeRepository $buildingtype)
    {
        $this->buildingtype = $buildingtype;
    }

    /**
     * This method return the data of the model
     * @param ManageBuildingTypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBuildingTypeRequest $request)
    {
        return Datatables::of($this->buildingtype->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($buildingtype) {
                return Carbon::parse($buildingtype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($buildingtype) {
                return $buildingtype->action_buttons;
            })
            ->make(true);
    }
}
