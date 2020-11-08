<?php

namespace App\Repositories\Backend\Expenses;

use DB;
use Carbon\Carbon;
use App\Models\Expenses\Expense;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseRepository.
 */
class ExpenseRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Expense::class;

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
                config('module.expenses.table').'.id',
                config('module.expenses.table').'.who_pay',
                config('module.expenses.table').'.amount',
                config('module.expenses.table').'.pay_date',
                config('module.expenses.table').'.expense_type_id',
                config('module.expenses.table').'.building_id',
                config('module.expenses.table').'.buildings_details_id',
                config('module.expenses.table').'.created_at',
                config('module.expenses.table').'.updated_at',
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
        if (Expense::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.expenses.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Expense $expense
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Expense $expense, array $input)
    {
    	if ($expense->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.expenses.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Expense $expense
     * @throws GeneralException
     * @return bool
     */
    public function delete(Expense $expense)
    {
        if ($expense->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.expenses.delete_error'));
    }
}
