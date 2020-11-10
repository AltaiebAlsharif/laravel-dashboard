<?php

namespace App\Http\Controllers\Backend\BuildingUnits;

use App\Models\BuildingUnits\BuildingUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\BuildingUnits\CreateResponse;
use App\Http\Responses\Backend\BuildingUnits\EditResponse;
use App\Repositories\Backend\BuildingUnits\BuildingUnitRepository;
use App\Http\Requests\Backend\BuildingUnits\ManageBuildingUnitRequest;
use App\Http\Requests\Backend\BuildingUnits\CreateBuildingUnitRequest;
use App\Http\Requests\Backend\BuildingUnits\StoreBuildingUnitRequest;
use App\Http\Requests\Backend\BuildingUnits\EditBuildingUnitRequest;
use App\Http\Requests\Backend\BuildingUnits\UpdateBuildingUnitRequest;
use App\Http\Requests\Backend\BuildingUnits\DeleteBuildingUnitRequest;

/**
 * BuildingUnitsController
 */
class BuildingUnitsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingUnitRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BuildingUnitRepository $repository;
     */
    public function __construct(BuildingUnitRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\BuildingUnits\ManageBuildingUnitRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBuildingUnitRequest $request)
    {
        return new ViewResponse('backend.buildingunits.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBuildingUnitRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingUnits\CreateResponse
     */
    public function create(CreateBuildingUnitRequest $request)
    {
        return new CreateResponse('backend.buildingunits.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBuildingUnitRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBuildingUnitRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.buildingunits.index'), ['flash_success' => trans('alerts.backend.buildingunits.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\BuildingUnits\BuildingUnit  $buildingunit
     * @param  EditBuildingUnitRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingUnits\EditResponse
     */
    public function edit(BuildingUnit $buildingunit, EditBuildingUnitRequest $request)
    {
        return new EditResponse($buildingunit);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBuildingUnitRequestNamespace  $request
     * @param  App\Models\BuildingUnits\BuildingUnit  $buildingunit
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBuildingUnitRequest $request, BuildingUnit $buildingunit)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $buildingunit, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.buildingunits.index'), ['flash_success' => trans('alerts.backend.buildingunits.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBuildingUnitRequestNamespace  $request
     * @param  App\Models\BuildingUnits\BuildingUnit  $buildingunit
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(BuildingUnit $buildingunit, DeleteBuildingUnitRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($buildingunit);
        //returning with successfull message
        return new RedirectResponse(route('admin.buildingunits.index'), ['flash_success' => trans('alerts.backend.buildingunits.deleted')]);
    }
    
}
