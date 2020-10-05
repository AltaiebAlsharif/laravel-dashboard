<?php

namespace App\Http\Responses\Backend\BuildingDetail;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\BuildingDetail\BuildingDetail
     */
    protected $buildingdetail;

    /**
     * @param App\Models\BuildingDetail\BuildingDetail $buildingdetails
     */
    public function __construct($buildingdetail)
    {
        $this->buildingdetail = $buildingdetail;
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
        return view('backend.buildingdetails.edit')->with([
            'buildingdetail' => $this->buildingdetail
        ]);
    }
}