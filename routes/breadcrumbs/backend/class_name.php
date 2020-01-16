<?php

Breadcrumbs::for('admin.class_names.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_class_names.labels.management'), route('admin.class_names.index'));
});

Breadcrumbs::for('admin.class_names.create', function ($trail) {
    $trail->parent('admin.class_names.index');
    $trail->push(__('backend_class_names.labels.create'), route('admin.class_names.create'));
});

Breadcrumbs::for('admin.class_names.show', function ($trail, $id) {
    $trail->parent('admin.class_names.index');
    $trail->push(__('backend_class_names.labels.view'), route('admin.class_names.show', $id));
});

Breadcrumbs::for('admin.class_names.edit', function ($trail, $id) {
    $trail->parent('admin.class_names.index');
    $trail->push(__('backend.class_names.labels.edit'), route('admin.class_names.edit', $id));
});

Breadcrumbs::for('admin.class_names.deleted', function ($trail) {
    $trail->parent('admin.class_names.index');
    $trail->push(__('backend_class_names.labels.deleted'), route('admin.class_names.deleted'));
});
