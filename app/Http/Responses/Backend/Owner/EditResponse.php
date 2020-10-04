<?php

namespace App\Http\Responses\Backend\Owner;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Owner\Owner
     */
    protected $owner;

    /**
     * @param App\Models\Owner\Owner $owners
     */
    public function __construct($owner)
    {
        $this->owner = $owner;
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
        return view('backend.owners.edit')->with([
            'owner' => $this->owner
        ]);
    }
}