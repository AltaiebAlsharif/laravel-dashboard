<?php

namespace App\Repositories\Backend\Owner;

use DB;
use Carbon\Carbon;
use App\Models\Owner\Owner;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OwnerRepository.
 */
class OwnerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Owner::class;

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
                config('module.owners.table').'.id',
                config('module.owners.table').'.name',
                config('module.owners.table').'.phone',
                config('module.owners.table').'.identity',
                config('module.owners.table').'.created_at',
                config('module.owners.table').'.updated_at',
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
        if (Owner::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.owners.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Owner $owner
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Owner $owner, array $input)
    {
    	if ($owner->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.owners.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Owner $owner
     * @throws GeneralException
     * @return bool
     */
    public function delete(Owner $owner)
    {
        if ($owner->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.owners.delete_error'));
    }
}
