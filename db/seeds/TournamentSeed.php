<?php

use Phinx\Seed\AbstractSeed;

class TournamentSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['name' => 'World Cup 2026'];
        $data[] = ['name' => 'Euro 2024'];
        $data[] = ['name' => 'World Cup 2022'];
        $this->insert('Tournament', $data);
    }
}
