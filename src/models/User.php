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
        $this->db = new Database();
    }

    /**
     * Find user by email
     *
     * @param string $email The email
     *
     * @return bool
     */
    public function findUserByEmail($email) : bool
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->single() != null) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Register user
     *
     * @param array $data The data
     *
     * @return bool
     */
    public function registerUser($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Login user
     *
     * @param string $email    The email
     * @param string $password The password
     *
     * @return bool|object
     */
    public function login($email, $password) : bool|object
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if (password_verify($password, $row->password)) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get user by id
     *
     * @param int $id The id
     *
     * @return object
     */
    public function getUser($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    /**
     * Get team name by id
     *
     * @param int $id The id
     *
     * @return object
     */
    public function getTeamName($id)
    {
        $this->db->query("SELECT name FROM teams WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    /**
     * Get role name by id
     *
     * @param int $id The id
     *
     * @return object
     */
    public function getRoleName($id)
    {
        $this->db->query("SELECT name FROM roles WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }
}
