<?php

namespace App\Http\Responses\Backend\BuildingUnits;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\BuildingUnits\BuildingUnit
     */
    protected $buildingunit;

    /**
     * @param App\Models\BuildingUnits\BuildingUnit $buildingunits
     */
    public function __construct($buildingunit)
    {
        $this->buildingunit = $buildingunit;
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
        return view('backend.buildingunits.edit')->with([
            'buildingunits' => $this->buildingunit
        ]);
    }
}