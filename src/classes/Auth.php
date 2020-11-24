<?php

class Auth
{
    public static function login() 
    {
        if (!isset($_POST["submit"])) return;
        echo $_POST['submit'];

        $data = $_POST;
        unset($data['submit']);
        if (empty($_SESSION['login'])) {
            $_SESSION['login'] = $data;
        } else {
            $_SESSION['login'] = array_merge($_SESSION['login'], $data);
        }

        unset($_SESSION['login']['error_messages']);
        $error_messages = [];
        $login_fields = [
            'email' => 'Email invullen',
            'password' => 'Wachtwoord invullen'
        ];

        if (empty($_POST["email"]) || empty($_POST["password"])) {
            foreach ($login_fields as $login_field => $error) {
                if (empty($_POST[$login_field])) {
                    $error_messages[$login_field] = $error;
                }
            }

            $_SESSION['login']['error_messages'] = $error_messages;

            Route::redirect('/login', '/login');
        }

        unset($_SESSION['login']['error_messages']);

        Route::redirect('/login', '/user/profile');
    }

    // private $username;
    // private $password;
    // private $db;


    // public function __construct()
    // {
    //     $this->db = new DB();
    // }

    // private function generateSession($usertoken)
    // {
    //     $_SESSION['isloggedIn'] = $usertoken;
    // }

    // public function register($username, $password, $repeat)
    // {
    //     if (empty($username) || empty($password) || empty($repeat)) {
    //     }

    //     if ($password !== $repeat) {
    //     }

    //     $this->username = $username;
    //     $this->password = $password;

    //     $this->login($this->username, $this->password);
    // }

    // public function login($username, $password)
    // {
    //     if (empty($username) || empty($password)) {
    //         return 'Please fill all fields!';
    //     }

    //     $this->username = $username;
    //     $this->password = $password;
    // }

    // public function logout()
    // {
    //     session_destroy();
    //     session_regenerate_id(true);
    // }
}
