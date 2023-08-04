<?php
class Page
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

    public function listMatchesByTournament($id)
    {
        $this->db->query('SELECT m.id, t.name AS tournament_name, tm1.name AS team1_name, tm2.name AS team2_name, m.match_date
                          FROM matches m
                          INNER JOIN tournament t ON m.tournament_id = t.id
                          INNER JOIN teams tm1 ON m.team1_id = tm1.id
                          INNER JOIN teams tm2 ON m.team2_id = tm2.id
                          WHERE m.tournament_id = :id');
        $this->db->bind(':id', $id);
        $res = $this->db->resultSet();
        return $res;
    }
}
