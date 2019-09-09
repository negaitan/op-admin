<?php

return [
    'table' => [
        'name'          => 'Name',
        'web_text'      => 'Web Text',
        'address'       => 'Address',
        'opening_time'  => 'Opening time',
        'latitude'      => 'Latitude',
        'longitude'     => 'Longitude',
        'images'     => 'Images',
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
            'name'          => 'Name',
            'web_text'      => 'Web Text',
            'address'       => 'Address',
            'opening_time'  => 'Opening time',
            'latitude'      => 'Latitude',
            'longitude'     => 'Longitude',
            'images'        => 'Images',
            'amenities'     => 'Amenities',
        ]
    ],

    'sidebar' => [
        'title'     => 'Clubs',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'name'          => 'Name',
                'web_text'      => 'Web Text',
                'address'       => 'Address',
                'opening_time'  => 'Opening time',
                'latitude'      => 'Latitude',
                'longitude'     => 'Longitude',
                'images'        => 'Images',
                'amenities'     => 'Amenities',
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
