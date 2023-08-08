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
        $res = $this->betModel->listMatchesByTournament(1);
        $data = [
                 'title'       => 'Bets',
                 'description' => 'Tournament Bet',
                 'matches'     => $res,
                ];

        $this->view('bets/index', $data);
    }
}
