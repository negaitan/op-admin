<?php

Breadcrumbs::for('admin.flashs.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_flashs.labels.management'), route('admin.flashs.index'));
});

Breadcrumbs::for('admin.flashs.create', function ($trail) {
    $trail->parent('admin.flashs.index');
    $trail->push(__('backend_flashs.labels.create'), route('admin.flashs.create'));
});

Breadcrumbs::for('admin.flashs.show', function ($trail, $id) {
    $trail->parent('admin.flashs.index');
    $trail->push(__('backend_flashs.labels.view'), route('admin.flashs.show', $id));
});

Breadcrumbs::for('admin.flashs.edit', function ($trail, $id) {
    $trail->parent('admin.flashs.index');
    $trail->push(__('backend.flashs.labels.edit'), route('admin.flashs.edit', $id));
});

Breadcrumbs::for('admin.flashs.deleted', function ($trail) {
    $trail->parent('admin.flashs.index');
    $trail->push(__('backend_flashs.labels.deleted'), route('admin.flashs.deleted'));
});
