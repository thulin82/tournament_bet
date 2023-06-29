<?php

use Phinx\Seed\AbstractSeed;

class TeamsSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['name' => 'Argentina'];
        $data[] = ['name' => 'Brazil'];
        $data[] = ['name' => 'Germany'];
        $data[] = ['name' => 'Italy'];
        $data[] = ['name' => 'France'];
        $data[] = ['name' => 'Spain'];
        $data[] = ['name' => 'England'];
        $data[] = ['name' => 'Portugal'];
        $data[] = ['name' => 'Netherlands'];
        $data[] = ['name' => 'Belgium'];
        $this->insert('Teams', $data);
    }
}
