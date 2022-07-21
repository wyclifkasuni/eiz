<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'supadm' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'aspirants'=>'c,r,u,d',
            'categories'=>'c,r,u,d',
        ],
        'adm' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
            'aspirants'=>'c,r,u',
            'categories'=>'c,r,u',
            
        ],
        'user' => [
            'profile' => 'r,u',
        ],
        'aspirant' => [
            'profile' => 'r,u',
        ],
        'voter'=>[
            'profile'=>'r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
