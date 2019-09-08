<?php

Breadcrumbs::for('admin.class_groups.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_class_groups.labels.management'), route('admin.class_groups.index'));
});

Breadcrumbs::for('admin.class_groups.create', function ($trail) {
    $trail->parent('admin.class_groups.index');
    $trail->push(__('backend_class_groups.labels.create'), route('admin.class_groups.create'));
});

Breadcrumbs::for('admin.class_groups.show', function ($trail, $id) {
    $trail->parent('admin.class_groups.index');
    $trail->push(__('backend_class_groups.labels.view'), route('admin.class_groups.show', $id));
});

Breadcrumbs::for('admin.class_groups.edit', function ($trail, $id) {
    $trail->parent('admin.class_groups.index');
    $trail->push(__('backend.class_groups.labels.edit'), route('admin.class_groups.edit', $id));
});

Breadcrumbs::for('admin.class_groups.deleted', function ($trail) {
    $trail->parent('admin.class_groups.index');
    $trail->push(__('backend_class_groups.labels.deleted'), route('admin.class_groups.deleted'));
});
