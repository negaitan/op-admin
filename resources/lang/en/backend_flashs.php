<?php

return [
    'table' => [
        'name'                  => 'Name',
        'description'           => 'Description',
        'price_month'           => 'Price month',
        'price_matriculation'   => 'Price matriculation',
        'created'       => 'Created',
        'actions'       => 'Actions',
        'last_updated'  => 'Updated',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'New Flash created',
        'updated' => 'Flash updated',
        'deleted' => 'Flash was deleted',
        'deleted_permanently' => 'Flash was permanently deleted',
        'restored'  => 'Flash was restored',
    ],

    'label'    => 'Flashs',
    'labels'    => [
        'management'    => 'Management of Flash',
        'active'        => 'Active',
        'create'        => 'Create',
        'edit'          => 'Edit',
        'view'          => 'View',
        'name'                  => 'Name',
        'description'           => 'Description',
        'price_month'           => 'Price month',
        'price_matriculation'   => 'Price matriculation',
        'created_at'    => 'Created at',
        'last_updated'  => 'Updated at',
        'deleted'       => 'Deleted',
    ],

    'validation' => [
        'attributes' => [
            'name'                  => 'Name',
            'description'           => 'Description',
            'price_month'           => 'Price month',
            'price_matriculation'   => 'Price matriculation',
        ]
    ],

    'sidebar' => [
        'title'     => 'Flashs',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'name'                  => 'Name',
                'description'           => 'Description',
                'price_month'           => 'Price month',
                'price_matriculation'   => 'Price matriculation',
                'created_at'    => 'Created',
                'last_updated'  => 'Updated'
            ],
        ],
    ],

    'menus' => [
      'main' => 'Flash',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
