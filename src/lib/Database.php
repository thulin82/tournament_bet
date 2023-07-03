<?php

class Database
{
    /**
     * Options array
     *
     * @var array $options Array with options
     */
    protected $options;

    /**
     * The PDO object
     *
     * @var mixed $db The PDO object
     */
    private $db = null;

    /**
     * The statement
     *
     * @var mixed $stmt The SQL statement
     */
    private $stmt = null;

    /**
     * Constructor
     *
     * @param array $options Array with options
     */
    public function __construct(array $options)
    {
        $this->options = $options;
    }

    /**
     * Connect to the database
     *
     * @return self
     */
    public function connect()
    {
        if ($this->db) {
            return $this;
        }

        if (!isset($this->options["dsn"])) {
            throw new Exception("Missing dsn.");
        }

        try {
            $this->db = new PDO(
                $this->options['dsn'],
                $this->options['username'],
                $this->options['password']
            );
            $this->db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->options['fetch_style']);
        } catch (Exception $e) {
            throw new PDOException('Could not connect to database, hiding connection details.');
        }

        return $this;
    }

    /**
     * Execute
     *
     * @param string $query  Query to execute
     * @param array  $params Array with parameters
     *
     * @return bool $res
     */
    public function execute(string $query, array $params = array()) : bool
    {
        $this->stmt = $this->db->prepare($query);
        $res = $this->stmt->execute($params);

        return $res;
    }
    
    /**
     * ExecuteQueryFetchAll
     *
     * @param string $query  Query to execute
     * @param array  $params Array with parameters
     *
     * @return array $res
     */
    public function executeQueryFetchAll(string $query, array $params = array()) : array
    {
        $this->stmt = $this->db->prepare($query);
        $this->stmt->execute($params);
        $res = $this->stmt->fetchAll();
        return $res;
    }
    
    /**
     * ExecuteQueryFetch
     *
     * @param string $query  Query to execute
     * @param array  $params Array with parameters
     *
     * @return mixed $res
     */
    public function executeQueryFetch(string $query, array $params = array()) : mixed
    {
        $this->stmt = $this->db->prepare($query);
        $this->stmt->execute($params);
        $res = $this->stmt->fetch();
        return $res;
    }
}
