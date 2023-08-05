<?php

class Database
{
    /**
     * The database host
     *
     * @var string $host
     */
    private $host = DB_HOST;

    /**
     * The database username
     *
     * @var string $user
     */
    private $user = DB_USERNAME;

    /**
     * The database password
     *
     * @var string $pass
     */
    private $pass = DB_PASSWORD;

    /**
     * The database fetch style
     *
     * @var string $fetch_style
     */
    private $fetch_style = DB_FETCH_STYLE;

    /**
     * The database handler
     *
     * @var object $dbh
     */
    private $dbh;

    /**
     * The database statement
     *
     * @var object $stmt
     */
    private $stmt;

    /**
     * The database error
     *
     * @var string $error
     */
    private $error;

    /**
     * Constructor
     *
     * @param bool $test If true, use in memory database
     *
     * @return void
     */
    public function __construct($test = false)
    {
        if ($test) {
            $this->host = 'sqlite::memory:';
        }
        $options = array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
                   );

        try {
            $this->dbh = new PDO($this->host, $this->user, $this->pass, $options);
            $this->dbh->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->fetch_style);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Query
     *
     * @param string $sql The sql query
     *
     * @return void
     */
    public function query($sql)
    {
        try {
            $this->stmt = $this->dbh->prepare($sql);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Bind
     *
     * @param string $param The parameter
     * @param string $value The value
     * @param string $type  The type
     *
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        try {
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
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }//end try
    }

    /**
     * Execute
     *
     * @return bool|void
     */
    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Result Set
     *
     * @return array|void
     */
    public function resultSet()
    {
        try {
            $this->execute();
            return $this->stmt->fetchAll($this->fetch_style);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Single
     *
     * @return object|void
     */
    public function single()
    {
        try {
            $this->execute();
            return $this->stmt->fetch($this->fetch_style);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Row Count
     *
     * @return int|void
     */
    public function rowCount()
    {
        try {
            return $this->stmt->rowCount();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
}
