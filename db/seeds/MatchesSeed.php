<?php

use Phinx\Seed\AbstractSeed;

class MatchesSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['tournament_id' => 1, 'team1_id' => 1, 'team2_id' => 2, 'match_date' => '2022-06-01 17:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 3, 'team2_id' => 4, 'match_date' => '2022-06-01 20:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 5, 'team2_id' => 6, 'match_date' => '2022-06-02 17:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 7, 'team2_id' => 8, 'match_date' => '2022-06-02 20:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 9, 'team2_id' => 10, 'match_date' => '2022-06-03 17:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 1, 'team2_id' => 3, 'match_date' => '2022-06-03 20:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 2, 'team2_id' => 4, 'match_date' => '2022-06-04 17:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 5, 'team2_id' => 7, 'match_date' => '2022-06-04 20:00:00'];
        $data[] = ['tournament_id' => 1, 'team1_id' => 6, 'team2_id' => 8, 'match_date' => '2022-06-05 17:00:00'];
        $this->insert('Matches', $data);
    }
}
