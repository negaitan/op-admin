<?php

return [
    'table' => [
        'title'    => 'title',
        'created'       => 'Created',
        'actions'       => 'Actions',
        'last_updated'  => 'Updated',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'New Plan created',
        'updated' => 'Plan updated',
        'deleted' => 'Plan was deleted',
        'deleted_permanently' => 'Plan was permanently deleted',
        'restored'  => 'Plan was restored',
    ],

    'label'    => 'Plans',
    'labels'    => [
        'management'    => 'Management of Plan',
        'active'        => 'Active',
        'create'        => 'Create',
        'edit'          => 'Edit',
        'view'          => 'View',
        'title'    => 'title',
        'created_at'    => 'Created at',
        'last_updated'  => 'Updated at',
        'deleted'       => 'Deleted',
    ],

    'validation' => [
        'attributes' => [
            'title' => 'title',
        ]
    ],

    'sidebar' => [
        'title'  => 'Title',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'title'    => 'title',
                'created_at'    => 'Created',
                'last_updated'  => 'Updated'
            ],
        ],
    ],

    'menus' => [
      'main' => 'Plan',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
