<?php

namespace App\Http\Responses\Backend\BuildingType;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\BuildingType\BuildingType
     */
    protected $buildingtype;

    /**
     * @param App\Models\BuildingType\BuildingType $buildingtypes
     */
    public function __construct($buildingtype)
    {
        $this->buildingtype = $buildingtype;
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
        return view('backend.buildingtypes.edit')->with([
            'buildingtype' => $this->buildingtype
        ]);
    }
}