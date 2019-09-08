<?php

Breadcrumbs::for('admin.gym_classes.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_gym_classes.labels.management'), route('admin.gym_classes.index'));
});

Breadcrumbs::for('admin.gym_classes.create', function ($trail) {
    $trail->parent('admin.gym_classes.index');
    $trail->push(__('backend_gym_classes.labels.create'), route('admin.gym_classes.create'));
});

Breadcrumbs::for('admin.gym_classes.show', function ($trail, $id) {
    $trail->parent('admin.gym_classes.index');
    $trail->push(__('backend_gym_classes.labels.view'), route('admin.gym_classes.show', $id));
});

Breadcrumbs::for('admin.gym_classes.edit', function ($trail, $id) {
    $trail->parent('admin.gym_classes.index');
    $trail->push(__('backend.gym_classes.labels.edit'), route('admin.gym_classes.edit', $id));
});

Breadcrumbs::for('admin.gym_classes.deleted', function ($trail) {
    $trail->parent('admin.gym_classes.index');
    $trail->push(__('backend_gym_classes.labels.deleted'), route('admin.gym_classes.deleted'));
});
