<?php

return [
    'table' => [
        'name'              => 'Name',
        'logo_image'        => 'Logo image',
        'description'       => 'Description',
        'cover_image'       => 'Cover image',
        'video_url'         => 'Video url',
        'classes'           => 'Classes',
        'teacher_image'     => 'Teacher image',
        'teacher_name'      => 'Teacher name',
        'teacher_title'     => 'Teacher title',
        'teacher_text'      => 'Teacher text',
        'playlist_url'      => 'Playlist url',
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
            'name'              => 'Name',
            'logo_image'        => 'Logo image',
            'description'       => 'Description',
            'cover_image'       => 'Cover image',
            'video_url'         => 'Video url',
            'classes'           => 'Classes',
            'teacher_image'     => 'Teacher image',
            'teacher_name'      => 'Teacher name',
            'teacher_title'     => 'Teacher title',
            'teacher_text'      => 'Teacher text',
            'playlist_url'      => 'Playlist url',
        ]
    ],

    'sidebar' => [
        'title'              => 'Grupos de clase',
    ],

    'tabs' => [
        'title'    => 'title',
        'content'   => [
            'overview' => [
                'name'              => 'Name',
                'logo_image'        => 'Logo image',
                'description'       => 'Description',
                'cover_image'       => 'Cover image',
                'video_url'         => 'Video url',
                'classes'           => 'Classes',
                'teacher_image'     => 'Teacher image',
                'teacher_name'      => 'Teacher name',
                'teacher_title'     => 'Teacher title',
                'teacher_text'      => 'Teacher text',
                'playlist_url'      => 'Playlist url',
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
