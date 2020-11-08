<?php

namespace App\Http\Responses\Backend\Expenses;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Expenses\Expense
     */
    protected $expense;

    /**
     * @param App\Models\Expenses\Expense $expenses
     */
    public function __construct($expense)
    {
        $this->expense = $expense;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.expenses.edit')->with([
            'expense' => $this->expense
        ]);
    }
}