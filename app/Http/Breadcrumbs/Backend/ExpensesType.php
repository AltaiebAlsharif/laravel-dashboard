<?php

Breadcrumbs::register('admin.expensestypes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.expensestypes.management'), route('admin.expensestypes.index'));
});

Breadcrumbs::register('admin.expensestypes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.expensestypes.index');
    $breadcrumbs->push(trans('menus.backend.expensestypes.create'), route('admin.expensestypes.create'));
});

Breadcrumbs::register('admin.expensestypes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.expensestypes.index');
    $breadcrumbs->push(trans('menus.backend.expensestypes.edit'), route('admin.expensestypes.edit', $id));
});
