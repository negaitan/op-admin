<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';

require __DIR__.'/club.php';
require __DIR__.'/setting.php';
require __DIR__.'/plan.php';

require __DIR__.'/gym_class.php';
require __DIR__.'/image.php';
require __DIR__.'/web_text.php';
require __DIR__.'/class_group.php';