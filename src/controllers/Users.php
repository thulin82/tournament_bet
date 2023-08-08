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
     * Login
     *
     * @return void
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            // Proccess form.
            $data = [
                     'email'        => trim($_POST['email']),
                     'password'     => trim($_POST['password']),
                     'email_err'    => '',
                     'password_err' => '',
                    ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            }
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found.
            } else {
                $data['email_err'] = 'No user found';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated.
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create session.
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                     'email'        => '',
                     'password'     => '',
                     'email_err'    => '',
                     'password_err' => '',
                    ];
            $this->view('users/login', $data);
        }//end if
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('');
    }

    /**
     * Create user session
     *
     * @param object $user User object
     *
     * @return void
     */
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('bets');
    }
}
