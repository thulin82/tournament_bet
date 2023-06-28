<?php

use Phinx\Migration\AbstractMigration;

class InitDatabase extends AbstractMigration
{
    public function change()
    {
        //Create the Bets table
        $table = $this->table('Bets');
        $table->addColumn('user_id', 'integer')
              ->addColumn('match_id', 'integer')
              ->addColumn('bet', 'string')
              ->create();
              
        //Create the Matches table
        $table2 = $this->table('Matches');
        $table2->addColumn('tournament_id', 'integer')
               ->addColumn('team1_id', 'integer')
               ->addColumn('team2_id', 'integer')
               ->addColumn('match_date', 'datetime')
               ->create();
               
        //Create the Teams table
        $table3 = $this->table('Teams');
        $table3->addColumn('name', 'string')
               ->create();
               
        //Create the Tournament table
        $table4 = $this->table('Tournament');
        $table4->addColumn('name', 'string')
               ->create();
               
        //Create the Users table
        $table5 = $this->table('Users');
        $table5->addColumn('name', 'string')
               ->addColumn('email', 'string')
               ->addColumn('password', 'string')
               ->create();

       //Create the Results table
        $table6 = $this->table('Results');
        $table6->addColumn('match_id', 'integer')
               ->addColumn('result', 'string')
               ->create();
    }
}
