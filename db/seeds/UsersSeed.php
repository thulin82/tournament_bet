<?php

use Phinx\Seed\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run() : void
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 1; $i < 11; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'email'      => $faker->email,
                'password'    => 'password' . $i,
            ];
        }
        $this->insert('Users', $data);
    }
}
