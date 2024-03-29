<?php
class Pages extends Controller
{
    /**
     * The page model
     *
     * @var object $pageModel
     */
    public $pageModel;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $data = [
                 'title'       => 'Index',
                 'description' => 'Tournament Bet',
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
