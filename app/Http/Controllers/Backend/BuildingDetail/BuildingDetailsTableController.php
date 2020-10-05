<?php

namespace App\Http\Controllers\Backend\BuildingDetail;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\BuildingDetail\BuildingDetailRepository;
use App\Http\Requests\Backend\BuildingDetail\ManageBuildingDetailRequest;

/**
 * Class BuildingDetailsTableController.
 */
class BuildingDetailsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingDetailRepository
     */
    protected $buildingdetail;

    /**
     * contructor to initialize repository object
     * @param BuildingDetailRepository $buildingdetail;
     */
    public function __construct(BuildingDetailRepository $buildingdetail)
    {
        $this->buildingdetail = $buildingdetail;
    }

    /**
     * This method return the data of the model
     * @param ManageBuildingDetailRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageBuildingDetailRequest $request)
    {
        return Datatables::of($this->buildingdetail->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($buildingdetail) {
                return Carbon::parse($buildingdetail->created_at)->toDateString();
            })
            ->addColumn('actions', function ($buildingdetail) {
                return $buildingdetail->action_buttons;
            })
            ->make(true);
    }
}
