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
        'created' => 'New GymClass created',
        'updated' => 'GymClass updated',
        'deleted' => 'GymClass was deleted',
        'deleted_permanently' => 'GymClass was permanently deleted',
        'restored'  => 'GymClass was restored',
    ],

    'label'    => 'GymClasses',
    'labels'    => [
        'management'    => 'Management of GymClass',
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
      'main' => 'GymClass',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
