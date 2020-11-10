<?php

Breadcrumbs::register('admin.buildingunits.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.buildingunits.management'), route('admin.buildingunits.index'));
});

Breadcrumbs::register('admin.buildingunits.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buildingunits.index');
    $breadcrumbs->push(trans('menus.backend.buildingunits.create'), route('admin.buildingunits.create'));
});

Breadcrumbs::register('admin.buildingunits.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buildingunits.index');
    $breadcrumbs->push(trans('menus.backend.buildingunits.edit'), route('admin.buildingunits.edit', $id));
});
