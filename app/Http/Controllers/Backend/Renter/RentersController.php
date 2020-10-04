<?php

namespace App\Http\Controllers\Backend\Renter;

use App\Models\Renter\Renter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Renter\CreateResponse;
use App\Http\Responses\Backend\Renter\EditResponse;
use App\Repositories\Backend\Renter\RenterRepository;
use App\Http\Requests\Backend\Renter\ManageRenterRequest;
use App\Http\Requests\Backend\Renter\CreateRenterRequest;
use App\Http\Requests\Backend\Renter\StoreRenterRequest;
use App\Http\Requests\Backend\Renter\EditRenterRequest;
use App\Http\Requests\Backend\Renter\UpdateRenterRequest;
use App\Http\Requests\Backend\Renter\DeleteRenterRequest;

/**
 * RentersController
 */
class RentersController extends Controller
{
    /**
     * variable to store the repository object
     * @var RenterRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RenterRepository $repository;
     */
    public function __construct(RenterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Renter\ManageRenterRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRenterRequest $request)
    {
        return new ViewResponse('backend.renters.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRenterRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Renter\CreateResponse
     */
    public function create(CreateRenterRequest $request)
    {
        return new CreateResponse('backend.renters.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRenterRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreRenterRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.renters.index'), ['flash_success' => trans('alerts.backend.renters.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Renter\Renter  $renter
     * @param  EditRenterRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Renter\EditResponse
     */
    public function edit(Renter $renter, EditRenterRequest $request)
    {
        return new EditResponse($renter);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRenterRequestNamespace  $request
     * @param  App\Models\Renter\Renter  $renter
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateRenterRequest $request, Renter $renter)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $renter, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.renters.index'), ['flash_success' => trans('alerts.backend.renters.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRenterRequestNamespace  $request
     * @param  App\Models\Renter\Renter  $renter
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Renter $renter, DeleteRenterRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($renter);
        //returning with successfull message
        return new RedirectResponse(route('admin.renters.index'), ['flash_success' => trans('alerts.backend.renters.deleted')]);
    }
    
}
