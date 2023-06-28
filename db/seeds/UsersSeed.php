<?php

use Phinx\Seed\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    public function run() : void
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'      => 'userName' . $i,
                'email'      => 'userMail' . $i . '@mail.com',
                'password'    => 'userSecret' . $i,
            ];
        }
        $this->insert('Users', $data);
    }
}
