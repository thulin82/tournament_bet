<?php

use Phinx\Migration\AbstractMigration;

class InitDatabase extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        //Create the first table
        $table = $this->table('Bets');
        $table->addColumn('Matchesid', 'integer')
              ->addColumn('Userid', 'integer')
              ->addColumn('betChar', 'string')
              ->addColumn('betResult', 'string')
              ->create();
              
        //Create the second table
        $table2 = $this->table('Matches');
        $table2->addColumn('Tournamentid', 'integer')
               ->addColumn('dateMatchDate', 'datetime')
               ->addColumn('idTeamHome', 'integer')
               ->addColumn('idTeamAway', 'integer')
               ->addColumn('idGoalsHome', 'integer')
               ->addColumn('idGoalsAway', 'integer')
               ->create();
               
        //Create the third table
        $table3 = $this->table('Teams');
        $table3->addColumn('nameTeam', 'string')
               ->addColumn('flagTeam', 'string')
               ->create();
               
        //Create the fourth table
        $table4 = $this->table('Tournament');
        $table4->addColumn('nameTournament', 'string')
               ->create();
               
        //Create the fifth table
        $table3 = $this->table('User');
        $table3->addColumn('userName', 'string')
               ->addColumn('userMail', 'string')
               ->addColumn('userSecret', 'string')
               ->create();
    }
}
