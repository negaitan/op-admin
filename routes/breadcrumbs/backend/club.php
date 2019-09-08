<?php

Breadcrumbs::for('admin.clubs.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_clubs.labels.management'), route('admin.clubs.index'));
});

Breadcrumbs::for('admin.clubs.create', function ($trail) {
    $trail->parent('admin.clubs.index');
    $trail->push(__('backend_clubs.labels.create'), route('admin.clubs.create'));
});

Breadcrumbs::for('admin.clubs.show', function ($trail, $id) {
    $trail->parent('admin.clubs.index');
    $trail->push(__('backend_clubs.labels.view'), route('admin.clubs.show', $id));
});

Breadcrumbs::for('admin.clubs.edit', function ($trail, $id) {
    $trail->parent('admin.clubs.index');
    $trail->push(__('backend.clubs.labels.edit'), route('admin.clubs.edit', $id));
});

Breadcrumbs::for('admin.clubs.deleted', function ($trail) {
    $trail->parent('admin.clubs.index');
    $trail->push(__('backend_clubs.labels.deleted'), route('admin.clubs.deleted'));
});
