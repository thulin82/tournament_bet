<?php
class Users extends Controller
{
    /**
     * UserModel
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
