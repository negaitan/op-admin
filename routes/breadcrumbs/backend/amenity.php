<?php

Breadcrumbs::for('admin.amenities.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_amenities.labels.management'), route('admin.amenities.index'));
});

Breadcrumbs::for('admin.amenities.create', function ($trail) {
    $trail->parent('admin.amenities.index');
    $trail->push(__('backend_amenities.labels.create'), route('admin.amenities.create'));
});

Breadcrumbs::for('admin.amenities.show', function ($trail, $id) {
    $trail->parent('admin.amenities.index');
    $trail->push(__('backend_amenities.labels.view'), route('admin.amenities.show', $id));
});

Breadcrumbs::for('admin.amenities.edit', function ($trail, $id) {
    $trail->parent('admin.amenities.index');
    $trail->push(__('backend.amenities.labels.edit'), route('admin.amenities.edit', $id));
});

Breadcrumbs::for('admin.amenities.deleted', function ($trail) {
    $trail->parent('admin.amenities.index');
    $trail->push(__('backend_amenities.labels.deleted'), route('admin.amenities.deleted'));
});
