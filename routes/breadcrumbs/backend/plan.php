<?php

Breadcrumbs::for('admin.plans.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_plans.labels.management'), route('admin.plans.index'));
});

Breadcrumbs::for('admin.plans.create', function ($trail) {
    $trail->parent('admin.plans.index');
    $trail->push(__('backend_plans.labels.create'), route('admin.plans.create'));
});

Breadcrumbs::for('admin.plans.show', function ($trail, $id) {
    $trail->parent('admin.plans.index');
    $trail->push(__('backend_plans.labels.view'), route('admin.plans.show', $id));
});

Breadcrumbs::for('admin.plans.edit', function ($trail, $id) {
    $trail->parent('admin.plans.index');
    $trail->push(__('backend.plans.labels.edit'), route('admin.plans.edit', $id));
});

Breadcrumbs::for('admin.plans.deleted', function ($trail) {
    $trail->parent('admin.plans.index');
    $trail->push(__('backend_plans.labels.deleted'), route('admin.plans.deleted'));
});
