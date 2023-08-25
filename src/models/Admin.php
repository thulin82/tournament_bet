<?php
class Admin
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
     * List all users in group
     *
     * @param int $groupId The group id
     *
     * @return array
     */
    public function listUsersInGroup($groupId)
    {
        $this->db->query(
            'SELECT u.id AS user_id, u.name AS user_name, SUM(b.points) AS total_points
            FROM users u
            LEFT JOIN bets b ON u.id = b.user_id
            WHERE u.group_id = :groupId
            GROUP BY u.id, u.name
            ORDER BY total_points DESC'
        );
        $this->db->bind(':groupId', $groupId);
        $res = $this->db->resultSet();
        return $res;
    }

    /**
     * Get group name by id
     *
     * @param int $groupId The id
     *
     * @return object
     */
    public function getGroupName($groupId)
    {
        $this->db->query(
            'SELECT name
            FROM groups
            WHERE id = :groupId'
        );
        $this->db->bind(':groupId', $groupId);
        $row = $this->db->single();

        return $row;
    }
}
