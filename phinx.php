<?php

return
[
 'paths'         => [
                     'migrations' => './db/migrations',
                     'seeds'      => './db/seeds',
                    ],
 'environments'  => [
                     'default_migration_table' => 'phinxlog',
                     'default_database'        => 'development',
                     'production'              => [
                                                   'adapter' => 'sqlite',
                                                   'name'    => 'db/tournament',
                                                   'suffix'  => '.sqlite',
                                                  ],
                     'development'             => [
                                                   'adapter' => 'sqlite',
                                                   'name'    => 'db/tournament',
                                                   'suffix'  => '.sqlite',
                                                  ],
                     'testing'                 => [
                                                   'adapter' => 'sqlite',
                                                   'name'    => 'db/tournament',
                                                   'suffix'  => '.sqlite',
                                                  ],
                    ],
 'version_order' => 'creation',
];
