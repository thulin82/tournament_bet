<?php
class Admins extends Controller
{
    /**
     * The admin model
     *
     * @var object $adminModel
     */
    public $adminModel;

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
        $this->adminModel = $this->model('Admin');
    }
}
