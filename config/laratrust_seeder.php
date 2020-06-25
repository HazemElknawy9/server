<?php

return [
    'role_structure' => [
        'super_admin' => [
            'admin' => 'c,r,u,d',
        ],
        'admin' => [],
        'affiliate' => []
    ],
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
