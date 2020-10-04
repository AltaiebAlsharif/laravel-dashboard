<?php

namespace App\Repositories\Backend\Renter;

use DB;
use Carbon\Carbon;
use App\Models\Renter\Renter;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RenterRepository.
 */
class RenterRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Renter::class;

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
                config('module.renters.table').'.id',
                config('module.renters.table').'.name',
                config('module.renters.table').'.phone',
                config('module.renters.table').'.identity',
                config('module.renters.table').'.created_at',
                config('module.renters.table').'.updated_at',
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
        if (Renter::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.renters.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Renter $renter
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Renter $renter, array $input)
    {
    	if ($renter->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.renters.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Renter $renter
     * @throws GeneralException
     * @return bool
     */
    public function delete(Renter $renter)
    {
        if ($renter->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.renters.delete_error'));
    }
}
