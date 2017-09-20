<?php

return [
    'role_structure' => [
        'superadministrador' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrador' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'usuário' => [
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'criar',
        'r' => 'ler',
        'u' => 'atualizar',
        'd' => 'remover'
    ]
];
