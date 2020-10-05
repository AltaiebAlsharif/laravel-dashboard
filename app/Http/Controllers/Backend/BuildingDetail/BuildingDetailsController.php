<?php

namespace App\Http\Controllers\Backend\BuildingDetail;

use App\Models\BuildingDetail\BuildingDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\BuildingDetail\CreateResponse;
use App\Http\Responses\Backend\BuildingDetail\EditResponse;
use App\Repositories\Backend\BuildingDetail\BuildingDetailRepository;
use App\Http\Requests\Backend\BuildingDetail\ManageBuildingDetailRequest;
use App\Http\Requests\Backend\BuildingDetail\CreateBuildingDetailRequest;
use App\Http\Requests\Backend\BuildingDetail\StoreBuildingDetailRequest;
use App\Http\Requests\Backend\BuildingDetail\EditBuildingDetailRequest;
use App\Http\Requests\Backend\BuildingDetail\UpdateBuildingDetailRequest;
use App\Http\Requests\Backend\BuildingDetail\DeleteBuildingDetailRequest;

/**
 * BuildingDetailsController
 */
class BuildingDetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var BuildingDetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BuildingDetailRepository $repository;
     */
    public function __construct(BuildingDetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\BuildingDetail\ManageBuildingDetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBuildingDetailRequest $request)
    {
        return new ViewResponse('backend.buildingdetails.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBuildingDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingDetail\CreateResponse
     */
    public function create(CreateBuildingDetailRequest $request)
    {
        return new CreateResponse('backend.buildingdetails.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBuildingDetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBuildingDetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.buildingdetails.index'), ['flash_success' => trans('alerts.backend.buildingdetails.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\BuildingDetail\BuildingDetail  $buildingdetail
     * @param  EditBuildingDetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\BuildingDetail\EditResponse
     */
    public function edit(BuildingDetail $buildingdetail, EditBuildingDetailRequest $request)
    {
        return new EditResponse($buildingdetail);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBuildingDetailRequestNamespace  $request
     * @param  App\Models\BuildingDetail\BuildingDetail  $buildingdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBuildingDetailRequest $request, BuildingDetail $buildingdetail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $buildingdetail, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.buildingdetails.index'), ['flash_success' => trans('alerts.backend.buildingdetails.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBuildingDetailRequestNamespace  $request
     * @param  App\Models\BuildingDetail\BuildingDetail  $buildingdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(BuildingDetail $buildingdetail, DeleteBuildingDetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($buildingdetail);
        //returning with successfull message
        return new RedirectResponse(route('admin.buildingdetails.index'), ['flash_success' => trans('alerts.backend.buildingdetails.deleted')]);
    }
    
}
