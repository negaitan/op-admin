<?php

return [
    'table' => [
        'zona'                  => 'Zona (ZO - R)',
        'nombrePlan'           => 'Nombre Plan',
        'price_month'           => 'Price month',
        'price_matriculation'   => 'Price matriculation',
        'created'       => 'Creado',
        'actions'       => 'Acciones',
        'last_updated'  => 'Modificado',
        'total'         => 'Total',
        'deleted'       => 'Borrado',
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
            'zona'                  => 'Zona (ZO - R)',
            'nombrePlan'           => 'Nombre del Plan',
            'precioFlash'           => 'Precio FLASH',
            'labelFlash'           => 'Etiqueta FLASH',
            'precioEspecial'           => 'Precio ESPECIAL',
            'labelEspecial'           => 'Etiqueta ESPECIAL',
            'precioOnSale'           => 'Precio ON SALE',
            'labelOnSale'           => 'Etiqueta ON SALE',
            'precioRegular'           => 'Precio REGUALAR',
            'labelRegular'           => 'Etiqueta REGUALAR',
        ]
    ],

    'sidebar' => [
        'title'     => 'Flash Sale',
    ],

    'tabs' => [
        'title'    => 'Precio',
        'content'   => [
            'overview' => [
                'zona'                  => 'Zona (ZO - R)',
                'nombrePlan'           => 'Nombre del Plan',
                'precioFlash'           => 'Precio FLASH',
                'labelFlash'           => 'Etiqueta FLASH',
                'precioEspecial'           => 'Precio ESPECIAL',
                'labelEspecial'           => 'Etiqueta ESPECIAL',
                'precioOnSale'           => 'Precio ON SALE',
                'labelOnSale'           => 'Etiqueta ON SALE',
                'precioRegular'           => 'Precio REGUALAR',
                'labelRegular'           => 'Etiqueta REGUALAR',
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
