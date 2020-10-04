<?php

Breadcrumbs::register('admin.renters.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.renters.management'), route('admin.renters.index'));
});

Breadcrumbs::register('admin.renters.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.renters.index');
    $breadcrumbs->push(trans('menus.backend.renters.create'), route('admin.renters.create'));
});

Breadcrumbs::register('admin.renters.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.renters.index');
    $breadcrumbs->push(trans('menus.backend.renters.edit'), route('admin.renters.edit', $id));
});
