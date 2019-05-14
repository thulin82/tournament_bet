<?php
use Nette\Neon\Exception;

class CDatabase
{
    /**
     * Options array
     *
     * @var array $options Should contain a description
     */
    protected $options;

    /**
     * The PDO object
     *
     * @var mixed $db      Should contain a description
     */
    private $db = null;

    /**
     * The statement
     *
     * @var mixed $stmt    Should contain a description
     */
    private $stmt = null;

    /**
     * [__construct description]
     *
     * @param array $options [description]
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
     * ExecuteQueryFetchAll
     *
     * @param string $query  Query to execute
     * @param array  $params [description]
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
     * @param array  $params [description]
     *
     * @return mixed $res
     */
    public function executeQueryFetch(string $query, array $params = array()) : stdClass
    {
        $this->stmt = $this->db->prepare($query);
        $this->stmt->execute($params);
        $res = $this->stmt->fetch();
        return $res;
    }
}
