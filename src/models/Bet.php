<?php
class Bet
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
     * List matches by tournament and with no bets by specific user
     *
     * @param int $userId       The user id
     * @param int $tournamentId The tournament id
     *
     * @return array
     */
    public function listMatchesWithNoBetsByTournamentAndUser($userId, $tournamentId) : array
    {
        $this->db->query(
            'SELECT m.id, t.name AS tournament_name, tm1.name AS team1_name, tm2.name AS team2_name, m.match_date
            FROM matches m
            INNER JOIN tournament t ON m.tournament_id = t.id
            INNER JOIN teams tm1 ON m.team1_id = tm1.id
            INNER JOIN teams tm2 ON m.team2_id = tm2.id
            LEFT JOIN bets b ON m.id = b.match_id AND b.user_id = :userId
            WHERE m.tournament_id = :tournamentId AND b.id IS NULL'
        );
        $this->db->bind(':userId', $userId);
        $this->db->bind(':tournamentId', $tournamentId);
        $res = $this->db->resultSet();
        return $res;
    }

    /**
     * List matches by tournament and with bets by specific user
     *
     * @param int $userId       The user id
     * @param int $tournamentId The tournament id
     *
     * @return array
     */
    public function listMatchesWithBetsByTournamentAndUser($userId, $tournamentId) : array
    {
        $this->db->query(
            'SELECT m.id, t.name AS tournament_name, tm1.name AS team1_name, tm2.name AS team2_name, m.match_date, b.bet
            FROM matches m
            INNER JOIN tournament t ON m.tournament_id = t.id
            INNER JOIN teams tm1 ON m.team1_id = tm1.id
            INNER JOIN teams tm2 ON m.team2_id = tm2.id
            INNER JOIN bets b ON m.id = b.match_id AND b.user_id = :userId
            WHERE m.tournament_id = :tournamentId'
        );
        $this->db->bind(':userId', $userId);
        $this->db->bind(':tournamentId', $tournamentId);
        $res = $this->db->resultSet();
        return $res;
    }

    /**
     * Get name of tournament
     *
     * @param int $id The tournament id
     *
     * @return string
     */
    public function getTournamentName($id) : string
    {
        $this->db->query('SELECT name FROM tournament WHERE id = :id');
        $this->db->bind(':id', $id);
        $res = $this->db->single();
        return $res->name;
    }
}
