<?php

namespace App\Http\Responses\Backend\Building;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Building\Building
     */
    protected $building;

    /**
     * @param App\Models\Building\Building $buildings
     */
    public function __construct($building)
    {
        $this->building = $building;
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
        return view('backend.buildings.edit')->with([
            'building' => $this->building
        ]);
    }
}