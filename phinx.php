<?php

return
[
    'paths' => [
        'migrations' => './db/migrations',
        'seeds' => './db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'development',
        'production' => [
            'adapter' => 'sqlite',
            'name' => 'db/tournament.sqlite'
        ],
        'development' => [
            'adapter' => 'sqlite',
            'name' => 'db/tournament.sqlite'
        ],
        'testing' => [
            'adapter' => 'sqlite',
            'name' => 'db/tournament.sqlite'
        ]
    ],
    'version_order' => 'creation'
];