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
     *
     * @throws PDOException If an error occurs while preparing the query.
     */
    public function query($sql) : void
    {
        try {
            $this->stmt = $this->dbh->prepare($sql);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Bind a parameter to the prepared statement.
     *
     * @param string $param The parameter placeholder in the query string.
     * @param mixed  $value The value to bind to the parameter.
     * @param int    $type  The data type of the parameter.
     *
     * @return void
     *
     * @throws PDOException If an error occurs while binding the parameter.
     */
    public function bind(string $param, $value, int $type = null): void
    {
        if ($type === null) {
            $type = self::getPdoType($value);
        }

        try {
            $this->stmt->bindValue($param, $value, $type);
        } catch (PDOException $e) {
            throw new PDOException("Error binding parameter '{$param}': " . $e->getMessage());
        }
    }

    /**
     * Get the PDO data type for a given value.
     *
     * @param mixed $value The value to get the data type for.
     *
     * @return int The PDO data type.
     */
    private static function getPdoType($value): int
    {
        if (is_int($value)) {
            return PDO::PARAM_INT;
        }

        if (is_bool($value)) {
            return PDO::PARAM_BOOL;
        }

        if (is_null($value)) {
            return PDO::PARAM_NULL;
        }

        return PDO::PARAM_STR;
    }

    /**
     * Execute
     *
     * @return bool|void
     *
     * @throws PDOException If an error occurs while executing the query.
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
     *
     * @throws PDOException If an error occurs while fetching the result set.
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
     *
     * @throws PDOException If an error occurs while fetching the result.
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
}
