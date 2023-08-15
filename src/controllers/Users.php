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
     * Register
     *
     * @return void
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            // Proccess form.
            $data = [
                     'name'                 => trim($_POST['name']),
                     'email'                => trim($_POST['email']),
                     'password'             => trim($_POST['password']),
                     'confirm_password'     => trim($_POST['confirm_password']),
                     'name_err'             => '',
                     'email_err'            => '',
                     'password_err'         => '',
                     'confirm_password_err' => '',
                    ];

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter a name';
            }

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already in system';
                }
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be greater than 6 characters';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please enter a password';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Confirm password must match password';
            }

            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated.
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->registerUser($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Error, stay on view.
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                     'name'                 => '',
                     'email'                => '',
                     'password'             => '',
                     'confirm_password'     => '',
                     'name_err'             => '',
                     'email_err'            => '',
                     'password_err'         => '',
                     'confirm_password_err' => '',
                    ];
            $this->view('users/register', $data);
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
        unset($_SESSION['user_role']);
        unset($_SESSION['user_group']);
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
        $_SESSION['user_role'] = $user->role_id;
        $_SESSION['user_group'] = $user->group_id;
        redirect('bets');
    }
}
