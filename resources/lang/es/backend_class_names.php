<?php

return [
    'table' => [
        'key'           => 'Nombre',
        'value'         => 'Descripción',
        'exposed'       => 'Activo',
        'created'       => 'Creado',
        'actions'       => 'Actions',
        'last_updated'  => 'Actualizado',
        'total'         => 'Total|Totals',
        'deleted'       => 'Deleted',
    ],

    'alerts' => [
        'created' => 'Nuevo nombre clase creada',
        'updated' => 'Nombre clase actualizada',
        'deleted' => 'Nombre clase borrado',
        'deleted_permanently' => 'Nombre clase was permanently deleted',
        'restored'  => 'Nombre clase was restored',
    ],

    'label'    => 'Nombre clases',
    'labels'    => [
        'management'    => 'Nombre de clase',
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
            'key'           => 'Nombre',
            'value'         => 'Descripción',
            'exposed'       => 'Activo',
        ]
    ],

    'sidebar' => [
        'title'           => 'Nombre Clase',
    ],

    'tabs' => [
        'title'    => 'Visualización',
        'content'   => [
            'overview' => [
                'key'           => 'Nombre',
                'value'         => 'Descripción',
                'exposed'       => 'Activo',
            ],
        ],
    ],

    'menus' => [
      'main' => 'Class Name',
      'all' => 'All',
      'create' => 'Create',
      'deleted' => 'Deleted'
    ]
];
