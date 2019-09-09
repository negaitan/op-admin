<?php

return [
    'table' => [
        'internal_key'  => 'Internal key',
        'url'           => 'Url',
        'alt'           => 'Alt',
        'created'       => 'Created',
        'actions'       => 'Actions',
        'last_updated'  => 'Updated',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'New Image created',
        'updated' => 'Image updated',
        'deleted' => 'Image was deleted',
        'deleted_permanently' => 'Image was permanently deleted',
        'restored'  => 'Image was restored',
    ],

    'label'    => 'Images',
    'labels'    => [
        'management'    => 'Management of Image',
        'active'        => 'Active',
        'create'        => 'Create',
        'edit'          => 'Edit',
        'view'          => 'View',
        'internal_key'  => 'Internal key',
        'url'           => 'Url',
        'alt'           => 'Alt',
        'created_at'    => 'Created at',
        'last_updated'  => 'Updated at',
        'deleted'       => 'Deleted',
    ],

    'validation' => [
        'attributes' => [
            'internal_key'  => 'Internal key',
            'url'           => 'Url',
            'alt'           => 'Alt',
        ]
    ],

    'sidebar' => [
        'title'  => 'Images',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'internal_key'  => 'Internal key',
                'url'           => 'Url',
                'alt'           => 'Alt',
                'created_at'    => 'Created',
                'last_updated'  => 'Updated'
            ],
        ],
    ],

    'menus' => [
      'main' => 'Image',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
