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
}
