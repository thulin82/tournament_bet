<?php

use Phinx\Seed\AbstractSeed;

class RolesSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['name' => 'admin'];
        $data[] = ['name' => 'user'];
        $this->insert('Roles', $data);
    }
}
