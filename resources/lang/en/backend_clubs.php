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
        'created' => 'New Club created',
        'updated' => 'Club updated',
        'deleted' => 'Club was deleted',
        'deleted_permanently' => 'Club was permanently deleted',
        'restored'  => 'Club was restored',
    ],

    'label'    => 'Clubs',
    'labels'    => [
        'management'    => 'Management of Club',
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
      'main' => 'Club',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
