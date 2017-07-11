<?php

use Phinx\Seed\AbstractSeed;

class UserSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'userName'      => $faker->name,
                'userMail'      => $faker->email,
                'userSecret'    => $faker->numberBetween(1000, 9999),
            ];
        }
        $this->insert('User', $data);
    }
}
