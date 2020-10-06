<?php

namespace App\Repositories\Backend\BuildingType;

use DB;
use Carbon\Carbon;
use App\Models\BuildingType\BuildingType;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildingTypeRepository.
 */
class BuildingTypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = BuildingType::class;

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
                config('module.buildingtypes.table').'.id',
                config('module.buildingtypes.table').'.name',
                config('module.buildingtypes.table').'.created_at',
                config('module.buildingtypes.table').'.updated_at',
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
        if (BuildingType::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.buildingtypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param BuildingType $buildingtype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(BuildingType $buildingtype, array $input)
    {
    	if ($buildingtype->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.buildingtypes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param BuildingType $buildingtype
     * @throws GeneralException
     * @return bool
     */
    public function delete(BuildingType $buildingtype)
    {
        if ($buildingtype->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.buildingtypes.delete_error'));
    }
}
