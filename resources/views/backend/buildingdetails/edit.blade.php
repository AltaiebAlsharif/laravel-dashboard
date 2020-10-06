@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.buildingdetails.management') . ' | ' . trans('labels.backend.buildingdetails.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.buildingdetails.management') }}
        <small>{{ trans('labels.backend.buildingdetails.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($buildingdetail, ['route' => ['admin.buildingdetails.update', $buildingdetail], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-buildingdetail']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.buildingdetails.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.buildingdetails.partials.buildingdetails-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.buildingdetails.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.buildingdetails.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection