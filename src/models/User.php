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
}
