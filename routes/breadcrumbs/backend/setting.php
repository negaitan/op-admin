<?php

Breadcrumbs::for('admin.settings.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_settings.labels.management'), route('admin.settings.index'));
});

Breadcrumbs::for('admin.settings.create', function ($trail) {
    $trail->parent('admin.settings.index');
    $trail->push(__('backend_settings.labels.create'), route('admin.settings.create'));
});

Breadcrumbs::for('admin.settings.show', function ($trail, $id) {
    $trail->parent('admin.settings.index');
    $trail->push(__('backend_settings.labels.view'), route('admin.settings.show', $id));
});

Breadcrumbs::for('admin.settings.edit', function ($trail, $id) {
    $trail->parent('admin.settings.index');
    $trail->push(__('backend.settings.labels.edit'), route('admin.settings.edit', $id));
});

Breadcrumbs::for('admin.settings.deleted', function ($trail) {
    $trail->parent('admin.settings.index');
    $trail->push(__('backend_settings.labels.deleted'), route('admin.settings.deleted'));
});
