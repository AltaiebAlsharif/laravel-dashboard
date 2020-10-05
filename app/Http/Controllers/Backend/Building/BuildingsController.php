<?php

namespace App\Http\Controllers\Backend\Building;

use App\Models\Building\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Building\CreateResponse;
use App\Http\Responses\Backend\Building\EditResponse;
use App\Repositories\Backend\Building\BuildingRepository;
use App\Http\Requests\Backend\Building\ManageBuildingRequest;
use App\Http\Requests\Backend\Building\CreateBuildingRequest;
use App\Http\Requests\Backend\Building\StoreBuildingRequest;
use App\Http\Requests\Backend\Building\EditBuildingRequest;
use App\Http\Requests\Backend\Building\UpdateBuildingRequest;
use App\Http\Requests\Backend\Building\DeleteBuildingRequest;

/**
 * BuildingsController
 */
class BuildingsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BuildingRepository $repository;
     */
    public function __construct(BuildingRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Building\ManageBuildingRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBuildingRequest $request)
    {
        return new ViewResponse('backend.buildings.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBuildingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Building\CreateResponse
     */
    public function create(CreateBuildingRequest $request)
    {
        return new CreateResponse('backend.buildings.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBuildingRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBuildingRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.buildings.index'), ['flash_success' => trans('alerts.backend.buildings.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Building\Building  $building
     * @param  EditBuildingRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Building\EditResponse
     */
    public function edit(Building $building, EditBuildingRequest $request)
    {
        return new EditResponse($building);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBuildingRequestNamespace  $request
     * @param  App\Models\Building\Building  $building
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBuildingRequest $request, Building $building)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $building, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.buildings.index'), ['flash_success' => trans('alerts.backend.buildings.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBuildingRequestNamespace  $request
     * @param  App\Models\Building\Building  $building
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Building $building, DeleteBuildingRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($building);
        //returning with successfull message
        return new RedirectResponse(route('admin.buildings.index'), ['flash_success' => trans('alerts.backend.buildings.deleted')]);
    }
    
}
