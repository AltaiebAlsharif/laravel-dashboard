<?php

Breadcrumbs::register('admin.buildingtypes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.buildingtypes.management'), route('admin.buildingtypes.index'));
});

Breadcrumbs::register('admin.buildingtypes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buildingtypes.index');
    $breadcrumbs->push(trans('menus.backend.buildingtypes.create'), route('admin.buildingtypes.create'));
});

Breadcrumbs::register('admin.buildingtypes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buildingtypes.index');
    $breadcrumbs->push(trans('menus.backend.buildingtypes.edit'), route('admin.buildingtypes.edit', $id));
});
