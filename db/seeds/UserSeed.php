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
    public function run() : void
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'userName'      => 'userName' . $i,
                'userMail'      => 'userMail' . $i . '@mail.com',
                'userSecret'    => 'userSecret' . $i,
            ];
        }
        $this->insert('User', $data);
    }
}
