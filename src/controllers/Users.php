<?php
class Users extends Controller
{
    /**
     * UserModel
     *
     * @var object $userModel
     */
    private $userModel;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('');
    }
}
