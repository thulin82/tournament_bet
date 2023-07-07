<?php
class Pages extends Controller
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $db_options['dsn']         = 'sqlite:../db/tournament.sqlite';
        $db_options['username']    = '';
        $db_options['password']    = '';
        $db_options['fetch_style'] = PDO::FETCH_OBJ;

        $db = new Database($db_options);
        $db->connect();
        $sql = 'SELECT m.id, t.name AS tournament_name, tm1.name AS team1_name, tm2.name AS team2_name, m.match_date
                FROM matches m
                INNER JOIN tournament t ON m.tournament_id = t.id
                INNER JOIN teams tm1 ON m.team1_id = tm1.id
                INNER JOIN teams tm2 ON m.team2_id = tm2.id
                WHERE m.tournament_id = ?';
        $param = array(1);
        $res = $db->executeQueryFetchAll($sql, $param);

        $data = [
                 'title'       => 'Index',
                 'description' => 'Tournament Bet',
                 'matches'     => $res,
                ];

        $this->view('pages/index', $data);
    }

    /**
     * About
     *
     * @return void
     */
    public function about()
    {
        $data = [
                 'title'       => 'About',
                 'description' => 'This page is built on PHP MVC Framework',
                ];
        $this->view('pages/about', $data);
    }
}
