<?php

Breadcrumbs::for('admin.web_texts.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('backend_web_texts.labels.management'), route('admin.web_texts.index'));
});

Breadcrumbs::for('admin.web_texts.create', function ($trail) {
    $trail->parent('admin.web_texts.index');
    $trail->push(__('backend_web_texts.labels.create'), route('admin.web_texts.create'));
});

Breadcrumbs::for('admin.web_texts.show', function ($trail, $id) {
    $trail->parent('admin.web_texts.index');
    $trail->push(__('backend_web_texts.labels.view'), route('admin.web_texts.show', $id));
});

Breadcrumbs::for('admin.web_texts.edit', function ($trail, $id) {
    $trail->parent('admin.web_texts.index');
    $trail->push(__('backend.web_texts.labels.edit'), route('admin.web_texts.edit', $id));
});

Breadcrumbs::for('admin.web_texts.deleted', function ($trail) {
    $trail->parent('admin.web_texts.index');
    $trail->push(__('backend_web_texts.labels.deleted'), route('admin.web_texts.deleted'));
});
