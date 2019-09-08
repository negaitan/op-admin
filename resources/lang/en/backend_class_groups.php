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
        'created' => 'New ClassGroup created',
        'updated' => 'ClassGroup updated',
        'deleted' => 'ClassGroup was deleted',
        'deleted_permanently' => 'ClassGroup was permanently deleted',
        'restored'  => 'ClassGroup was restored',
    ],

    'label'    => 'ClassGroups',
    'labels'    => [
        'management'    => 'Management of ClassGroup',
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
      'main' => 'ClassGroup',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
