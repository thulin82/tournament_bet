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

    public function query($sql)
    {
        try{
            $this->stmt = $this->dbh->prepare($sql);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function bind($param, $value, $type = null)
    {
        try{
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                    break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                    break;
                    default:
                        $type = PDO::PARAM_STR;
                    break;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function execute()
    {
        try{
            return $this->stmt->execute();
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function resultSet()
    {
        try{
            $this->execute();
            return $this->stmt->fetchAll($this->fetch_style);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function single()
    {
        try{
            $this->execute();
            return $this->stmt->fetch($this->fetch_style);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function rowCount()
    {
        try{
            return $this->stmt->rowCount();
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
