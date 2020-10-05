<?php

Breadcrumbs::register('admin.buildings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.buildings.management'), route('admin.buildings.index'));
});

Breadcrumbs::register('admin.buildings.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buildings.index');
    $breadcrumbs->push(trans('menus.backend.buildings.create'), route('admin.buildings.create'));
});

Breadcrumbs::register('admin.buildings.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buildings.index');
    $breadcrumbs->push(trans('menus.backend.buildings.edit'), route('admin.buildings.edit', $id));
});
