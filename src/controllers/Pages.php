<?php
class Pages extends Controller
{
    /**
     * The user model
     *
     * @var object $userModel
     */
    public $userModel;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->userModel = $this->model('Page');
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $res = $this->userModel->listMatchesByTournament(1);
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
