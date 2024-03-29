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

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $data = [
                 'group_name'    => $this->adminModel->getGroupName(1),
                 'group_members' => $this->adminModel->listUsersInGroup(1),
                ];

        $this->view('admins/index', $data);
    }
}
