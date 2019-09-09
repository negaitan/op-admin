<?php

return [
    'table' => [
        'club'          => 'Club',
        'name'          => 'Name',
        'teacher'       => 'Teacher',
        'day_time'      => 'Day time',
        'week_days'     => 'Week days',
        'start_at'      => 'Start at',
        'finish_at'     => 'Finish at',
        'room'          => 'Room',
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
        'club'          => 'Club',
        'name'          => 'Name',
        'teacher'       => 'Teacher',
        'day_time'      => 'Day time',
        'week_days'     => 'Week days',
        'start_at'      => 'Start at',
        'finish_at'     => 'Finish at',
        'room'          => 'Room',
        'created_at'    => 'Created at',
        'last_updated'  => 'Updated at',
        'deleted'       => 'Deleted',
    ],

    'validation' => [
        'attributes' => [
            'club'          => 'Club',
            'name'          => 'Name',
            'teacher'       => 'Teacher',
            'day_time'      => 'Day time',
            'week_days'     => 'Week days',
            'start_at'      => 'Start at',
            'finish_at'     => 'Finish at',
            'room'          => 'Room',
        ]
    ],

    'sidebar' => [
        'title'  => 'GymClasses',
    ],

    'tabs' => [
        'title'         => 'title',
        'content'   => [
            'overview' => [
                'club'          => 'Club',
                'name'          => 'Name',
                'teacher'       => 'Teacher',
                'day_time'      => 'Day time',
                'week_days'     => 'Week days',
                'start_at'      => 'Start at',
                'finish_at'     => 'Finish at',
                'room'          => 'Room',
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
