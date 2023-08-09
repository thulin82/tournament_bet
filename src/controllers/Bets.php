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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            // Proccess form.
            print_r($_POST);
        }

        $tournament_name = $this->betModel->getTournamentName(1);
        $tournament_games = $this->betModel->listMatchesWithNoBetsByTournamentAndUser(1, 1);
        $data = [
                 'title'   => $tournament_name,
                 'matches' => $tournament_games,
                ];

        $this->view('bets/index', $data);
    }

    /**
     * Results
     *
     * @return void
     */
    public function results()
    {
        $tournament_name = $this->betModel->getTournamentName(1);
        $tournament_games = $this->betModel->listMatchesWithBetsByTournamentAndUser(1, 1);
        $data = [
                 'title'   => $tournament_name,
                 'matches' => $tournament_games,
                ];

        $this->view('bets/results', $data);
    }
}
