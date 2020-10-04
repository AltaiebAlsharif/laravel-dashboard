<?php

namespace App\Http\Controllers\Backend\Owner;

use App\Models\Owner\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Owner\CreateResponse;
use App\Http\Responses\Backend\Owner\EditResponse;
use App\Repositories\Backend\Owner\OwnerRepository;
use App\Http\Requests\Backend\Owner\ManageOwnerRequest;
use App\Http\Requests\Backend\Owner\CreateOwnerRequest;
use App\Http\Requests\Backend\Owner\StoreOwnerRequest;
use App\Http\Requests\Backend\Owner\EditOwnerRequest;
use App\Http\Requests\Backend\Owner\UpdateOwnerRequest;
use App\Http\Requests\Backend\Owner\DeleteOwnerRequest;

/**
 * OwnersController
 */
class OwnersController extends Controller
{
    /**
     * variable to store the repository object
     * @var OwnerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param OwnerRepository $repository;
     */
    public function __construct(OwnerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Owner\ManageOwnerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageOwnerRequest $request)
    {
        return new ViewResponse('backend.owners.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateOwnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Owner\CreateResponse
     */
    public function create(CreateOwnerRequest $request)
    {
        return new CreateResponse('backend.owners.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreOwnerRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreOwnerRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.owners.index'), ['flash_success' => trans('alerts.backend.owners.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Owner\Owner  $owner
     * @param  EditOwnerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Owner\EditResponse
     */
    public function edit(Owner $owner, EditOwnerRequest $request)
    {
        return new EditResponse($owner);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOwnerRequestNamespace  $request
     * @param  App\Models\Owner\Owner  $owner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $owner, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.owners.index'), ['flash_success' => trans('alerts.backend.owners.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteOwnerRequestNamespace  $request
     * @param  App\Models\Owner\Owner  $owner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Owner $owner, DeleteOwnerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($owner);
        //returning with successfull message
        return new RedirectResponse(route('admin.owners.index'), ['flash_success' => trans('alerts.backend.owners.deleted')]);
    }
    
}
