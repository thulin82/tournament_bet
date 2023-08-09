<?php

use Phinx\Seed\AbstractSeed;

class ResultsSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        $data[] = ['match_id' => 1, 'result' => '1'];
        $data[] = ['match_id' => 2, 'result' => 'X'];
        $this->insert('Results', $data);
    }
}
