<?php

return [
    'table' => [
        'key'           => 'Key',
        'value'         => 'Value',
        'created'       => 'Created',
        'actions'       => 'Actions',
        'last_updated'  => 'Updated',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'New Amenity created',
        'updated' => 'Amenity updated',
        'deleted' => 'Amenity was deleted',
        'deleted_permanently' => 'Amenity was permanently deleted',
        'restored'  => 'Amenity was restored',
    ],

    'label'    => 'Amenity',
    'labels'    => [
        'management'    => 'Management of Amenity',
        'active'        => 'Active',
        'create'        => 'Create',
        'edit'          => 'Edit',
        'view'          => 'View',
        'key'           => 'Key',
        'value'         => 'Value',
        'created_at'    => 'Created at',
        'last_updated'  => 'Updated at',
        'deleted'       => 'Deleted',
    ],

    'validation' => [
        'attributes' => [
            'key'           => 'Key',
            'value'         => 'Value',
        ]
    ],

    'sidebar' => [
        'title'         => 'Amenities',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'key'           => 'Key',
                'value'         => 'Value',
                'created_at'    => 'Created',
                'last_updated'  => 'Updated'
            ],
        ],
    ],

    'menus' => [
      'main' => 'Amenity',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
