<?php
    class User
    {
        /**
         * The database object
         *
         * @var object $db
         */
        private $db;

        /**
         * Constructor
         *
         * @return void
         */
        public function __construct()
        {
            $db_options['dsn']         = 'sqlite:../db/tournament.sqlite';
            $db_options['username']    = '';
            $db_options['password']    = '';
            $db_options['fetch_style'] = PDO::FETCH_OBJ;

            $this->db = new Database($db_options);
        }  
    }