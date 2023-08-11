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
            $data = [
                     'title'   => '',
                     'matches' => '',
                     'err'     => '',
                    ];

            if (empty($_POST)) {
                $data['err'] = 'Please fill in the form';
            }

            if (empty($data['err'])) {
                // There are values we need to proccess.
                if ($this->betModel->storeBets($_POST)) {
                    redirect('bets/results');
                } else {
                    die('Something went wrong');
                }
            } else {
                $data['err'] = 'Something went wrong';
                $this->view('bets/index', $data);
            }
        } else {
            $data = [
                     'title'   => $this->betModel->getTournamentName(1),
                     'matches' => $this->betModel->listMatchesWithNoBetsByTournamentAndUser(1, 1),
                     'err'     => '',
                    ];
            $this->view('bets/index', $data);
        }//end if
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
