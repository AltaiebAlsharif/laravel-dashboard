<?php

namespace App\Http\Responses\Backend\Renter;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Renter\Renter
     */
    protected $renter;

    /**
     * @param App\Models\Renter\Renter $renters
     */
    public function __construct($renter)
    {
        $this->renter = $renter;
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
        return view('backend.renters.edit')->with([
            'renter' => $this->renter
        ]);
    }
}