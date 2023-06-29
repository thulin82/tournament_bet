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
        $data[] = ['name' => 'Euro 2020'];
        $data[] = ['name' => 'World Cup 2018'];
        $data[] = ['name' => 'Euro 2016'];
        $data[] = ['name' => 'World Cup 2014'];
        $this->insert('Tournament', $data);
    }
}
