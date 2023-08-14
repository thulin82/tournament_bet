<?php

use Phinx\Seed\AbstractSeed;

class GroupsSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['name' => 'Team A', 'admin_id' => 1];
        $data[] = ['name' => 'Team B', 'admin_id' => 2];
        $this->insert('Groups', $data);
    }
}
