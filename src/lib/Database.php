<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $pass = DB_PASSWORD;
    private $fetch_style = DB_FETCH_STYLE;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($this->host, $this->user, $this->pass, $options);
            $this->dbh->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->fetch_style);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
