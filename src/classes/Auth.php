<?php
class Auth
{
    private $username;
    private $password;
    private $db;


    public function __construct()
    {
        $this->db = new DB();
    }

    private function generateSession($usertoken)
    {
        $_SESSION['isloggedIn'] = $usertoken;
    }

    public function register($username, $password, $repeat)
    {
        if (empty($username) || empty($password) || empty($repeat)) {
        }

        if ($password !== $repeat) {
        }

        $this->username = $username;
        $this->password = $password;

        $this->login($this->username, $this->password);
    }

    public function login($username, $password)
    {
        if (empty($username) || empty($password)) {
            return 'Please fill all fields!';
        }

        $this->username = $username;
        $this->password = $password;
    }
    public function logout()
    {
        session_destroy();
        session_regenerate_id(true);
    }
}
