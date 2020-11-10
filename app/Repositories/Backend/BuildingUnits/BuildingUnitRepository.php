<?php

namespace App\Repositories\Backend\BuildingUnits;

use DB;
use Carbon\Carbon;
use App\Models\BuildingUnits\BuildingUnit;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildingUnitRepository.
 */
class BuildingUnitRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = BuildingUnit::class;

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
                config('module.buildingunits.table').'.id',
                config('module.buildingunits.table').'.created_at',
                config('module.buildingunits.table').'.updated_at',
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
        if (BuildingUnit::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.buildingunits.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param BuildingUnit $buildingunit
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(BuildingUnit $buildingunit, array $input)
    {
    	if ($buildingunit->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.buildingunits.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param BuildingUnit $buildingunit
     * @throws GeneralException
     * @return bool
     */
    public function delete(BuildingUnit $buildingunit)
    {
        if ($buildingunit->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.buildingunits.delete_error'));
    }
}
