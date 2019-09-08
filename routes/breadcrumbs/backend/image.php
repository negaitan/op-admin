<?php

Breadcrumbs::for('admin.images.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_images.labels.management'), route('admin.images.index'));
});

Breadcrumbs::for('admin.images.create', function ($trail) {
    $trail->parent('admin.images.index');
    $trail->push(__('backend_images.labels.create'), route('admin.images.create'));
});

Breadcrumbs::for('admin.images.show', function ($trail, $id) {
    $trail->parent('admin.images.index');
    $trail->push(__('backend_images.labels.view'), route('admin.images.show', $id));
});

Breadcrumbs::for('admin.images.edit', function ($trail, $id) {
    $trail->parent('admin.images.index');
    $trail->push(__('backend.images.labels.edit'), route('admin.images.edit', $id));
});

Breadcrumbs::for('admin.images.deleted', function ($trail) {
    $trail->parent('admin.images.index');
    $trail->push(__('backend_images.labels.deleted'), route('admin.images.deleted'));
});
