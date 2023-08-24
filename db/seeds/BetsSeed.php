<?php

use Phinx\Seed\AbstractSeed;

class BetsSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['user_id' => 1, 'match_id' => 1, 'bet' => '1', 'points' => 1];
        $data[] = ['user_id' => 2, 'match_id' => 1, 'bet' => 'X'];
        $data[] = ['user_id' => 3, 'match_id' => 1, 'bet' => '1', 'points' => 1];
        $data[] = ['user_id' => 1, 'match_id' => 2, 'bet' => 'X', 'points' => 1];
        $data[] = ['user_id' => 2, 'match_id' => 2, 'bet' => '1'];
        $data[] = ['user_id' => 3, 'match_id' => 2, 'bet' => '2'];
        $this->insert('Bets', $data);
    }
}
