<?php

return [
    'table' => [
        'key'           => 'Key',
        'value'         => 'Value',
        'exposed'       => 'Exposed',
        'created'       => 'Created',
        'actions'       => 'Actions',
        'last_updated'  => 'Updated',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'New Setting created',
        'updated' => 'Setting updated',
        'deleted' => 'Setting was deleted',
        'deleted_permanently' => 'Setting was permanently deleted',
        'restored'  => 'Setting was restored',
    ],

    'label'    => 'Settings',
    'labels'    => [
        'management'    => 'Management of Setting',
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
            'key'           => 'Key',
            'value'         => 'Value',
            'exposed'       => 'Exposed',
        ]
    ],

    'sidebar' => [
        'title'     => 'Settings',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'key'           => 'Key',
                'value'         => 'Value',
                'exposed'       => 'Exposed',
                'created_at'    => 'Created',
                'last_updated'  => 'Updated'
            ],
        ],
    ],

    'menus' => [
      'main' => 'Setting',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
