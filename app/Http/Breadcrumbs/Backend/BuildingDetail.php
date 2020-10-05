<?php

Breadcrumbs::register('admin.buildingdetails.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.buildingdetails.management'), route('admin.buildingdetails.index'));
});

Breadcrumbs::register('admin.buildingdetails.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buildingdetails.index');
    $breadcrumbs->push(trans('menus.backend.buildingdetails.create'), route('admin.buildingdetails.create'));
});

Breadcrumbs::register('admin.buildingdetails.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buildingdetails.index');
    $breadcrumbs->push(trans('menus.backend.buildingdetails.edit'), route('admin.buildingdetails.edit', $id));
});
