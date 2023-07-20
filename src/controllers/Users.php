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
}
