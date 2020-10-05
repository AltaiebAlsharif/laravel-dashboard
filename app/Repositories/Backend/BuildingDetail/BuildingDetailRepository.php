<?php

namespace App\Repositories\Backend\BuildingDetail;

use DB;
use Carbon\Carbon;
use App\Models\BuildingDetail\BuildingDetail;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildingDetailRepository.
 */
class BuildingDetailRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = BuildingDetail::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.buildingdetails.table').'.id',
                config('module.buildingdetails.table').'.apartment_name',
                config('module.buildingdetails.table').'.apartment_sepc',
                config('module.buildingdetails.table').'.apartment_status',
                config('module.buildingdetails.table').'.building_id',
                config('module.buildingdetails.table').'.created_at',
                config('module.buildingdetails.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (BuildingDetail::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.buildingdetails.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param BuildingDetail $buildingdetail
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(BuildingDetail $buildingdetail, array $input)
    {
    	if ($buildingdetail->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.buildingdetails.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param BuildingDetail $buildingdetail
     * @throws GeneralException
     * @return bool
     */
    public function delete(BuildingDetail $buildingdetail)
    {
        if ($buildingdetail->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.buildingdetails.delete_error'));
    }
}
