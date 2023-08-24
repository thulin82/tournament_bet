<?php

use Phinx\Seed\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run() : void
    {
        $faker = Faker\Factory::create();
        $data = [];
        $data[] = [
            'name'      => 'admin',
            'email'      => 'admin@admin.com',
            'password'    => password_hash('admin', PASSWORD_DEFAULT),
            'role_id'      => 1,
            'group_id'      => 1,

        ];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'email'      => $faker->email,
                'password'    => password_hash('password' . $i, PASSWORD_DEFAULT),
                'role_id'      => 2,
                'group_id'      => 1,
            ];
        }
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name'      => $faker->name,
                'email'      => $faker->email,
                'password'    => password_hash('password' . $i, PASSWORD_DEFAULT),
                'role_id'      => 2,
                'group_id'      => 2,
            ];
        }
        $this->insert('Users', $data);
    }
}
