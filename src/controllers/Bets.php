<?php
class Bets extends Controller
{
    /**
     * The bet model
     *
     * @var object $betModel
     */
    public $betModel;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->betModel = $this->model('Bet');
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $tournament_name = $this->betModel->getTournamentName(1);
        $tournament_games = $this->betModel->listMatchesByTournament(1);
        $data = [
                 'title'   => $tournament_name,
                 'matches' => $tournament_games,
                ];

        $this->view('bets/index', $data);
    }
}
