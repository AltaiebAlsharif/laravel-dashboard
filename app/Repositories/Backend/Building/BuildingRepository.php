<?php

namespace App\Repositories\Backend\Building;

use DB;
use Carbon\Carbon;
use App\Models\Building\Building;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BuildingRepository.
 */
class BuildingRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Building::class;

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
                config('module.buildings.table').'.id',
                config('module.buildings.table').'.name',
                config('module.buildings.table').'.city',
                config('module.buildings.table').'.neighborhood',
                config('module.buildings.table').'.received_date',
                config('module.buildings.table').'.owner_id',
                config('module.buildings.table').'.building_type_id',
                config('module.buildings.table').'.note',
                config('module.buildings.table').'.created_at',
                config('module.buildings.table').'.updated_at',
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
        if (Building::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.buildings.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Building $building
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Building $building, array $input)
    {
    	if ($building->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.buildings.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Building $building
     * @throws GeneralException
     * @return bool
     */
    public function delete(Building $building)
    {
        if ($building->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.buildings.delete_error'));
    }
}
