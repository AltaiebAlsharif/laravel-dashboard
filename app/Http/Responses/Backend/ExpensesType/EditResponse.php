<?php

namespace App\Http\Responses\Backend\ExpensesType;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\ExpensesType\ExpensesType
     */
    protected $expensestypes;

    /**
     * @param App\Models\ExpensesType\ExpensesType $expensestypes
     */
    public function __construct($expensestypes)
    {
        $this->expensestypes = $expensestypes;
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
        return view('backend.expensestypes.edit')->with([
            'expensestypes' => $this->expensestypes
        ]);
    }
}