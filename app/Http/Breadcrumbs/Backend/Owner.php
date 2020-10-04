<?php

Breadcrumbs::register('admin.owners.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.owners.management'), route('admin.owners.index'));
});

Breadcrumbs::register('admin.owners.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.owners.index');
    $breadcrumbs->push(trans('menus.backend.owners.create'), route('admin.owners.create'));
});

Breadcrumbs::register('admin.owners.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.owners.index');
    $breadcrumbs->push(trans('menus.backend.owners.edit'), route('admin.owners.edit', $id));
});
