<?php

namespace App\Repositories\Backend\ExpensesType;

use DB;
use Carbon\Carbon;
use App\Models\ExpensesType\ExpensesType;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpensesTypeRepository.
 */
class ExpensesTypeRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ExpensesType::class;

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
                config('module.expensestypes.table').'.id',
                config('module.expensestypes.table').'.created_at',
                config('module.expensestypes.table').'.updated_at',
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
        if (ExpensesType::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.expensestypes.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param ExpensesType $expensestype
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(ExpensesType $expensestype, array $input)
    {
    	if ($expensestype->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.expensestypes.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param ExpensesType $expensestype
     * @throws GeneralException
     * @return bool
     */
    public function delete(ExpensesType $expensestype)
    {
        if ($expensestype->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.expensestypes.delete_error'));
    }
}
