<?php

use Phinx\Seed\AbstractSeed;

class TeamsSeed extends AbstractSeed
{
    public function run() : void
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->country,
            ];
        }
        $this->insert('Teams', $data);
    }
}
