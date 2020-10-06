<?php

namespace App\Http\Controllers\Backend\BuildingType;

use App\Models\BuildingType\BuildingType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\BuildingType\CreateResponse;
use App\Http\Responses\Backend\BuildingType\EditResponse;
use App\Repositories\Backend\BuildingType\BuildingTypeRepository;
use App\Http\Requests\Backend\BuildingType\ManageBuildingTypeRequest;
use App\Http\Requests\Backend\BuildingType\CreateBuildingTypeRequest;
use App\Http\Requests\Backend\BuildingType\StoreBuildingTypeRequest;
use App\Http\Requests\Backend\BuildingType\EditBuildingTypeRequest;
use App\Http\Requests\Backend\BuildingType\UpdateBuildingTypeRequest;
use App\Http\Requests\Backend\BuildingType\DeleteBuildingTypeRequest;

/**
 * BuildingTypesController
 */
class BuildingTypesController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingTypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BuildingTypeRepository $repository;
     */
    public function __construct(BuildingTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\BuildingType\ManageBuildingTypeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBuildingTypeRequest $request)
    {
        return new ViewResponse('backend.buildingtypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBuildingTypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingType\CreateResponse
     */
    public function create(CreateBuildingTypeRequest $request)
    {
        return new CreateResponse('backend.buildingtypes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBuildingTypeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBuildingTypeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.buildingtypes.index'), ['flash_success' => trans('alerts.backend.buildingtypes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\BuildingType\BuildingType  $buildingtype
     * @param  EditBuildingTypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingType\EditResponse
     */
    public function edit(BuildingType $buildingtype, EditBuildingTypeRequest $request)
    {
        return new EditResponse($buildingtype);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBuildingTypeRequestNamespace  $request
     * @param  App\Models\BuildingType\BuildingType  $buildingtype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBuildingTypeRequest $request, BuildingType $buildingtype)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $buildingtype, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.buildingtypes.index'), ['flash_success' => trans('alerts.backend.buildingtypes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBuildingTypeRequestNamespace  $request
     * @param  App\Models\BuildingType\BuildingType  $buildingtype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(BuildingType $buildingtype, DeleteBuildingTypeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($buildingtype);
        //returning with successfull message
        return new RedirectResponse(route('admin.buildingtypes.index'), ['flash_success' => trans('alerts.backend.buildingtypes.deleted')]);
    }
    
}
