<?php
class Auth
{
    private $session;
    private $username;
    private $password;
    private $db;


    public function __construct()
    {
        $this->DB = new DB();
    }

    private function generateSession($usertoken)
    {
        // gen_session('isLoggedIn', $usertoken);
        $_SESSION['isloggedIn'] = $usertoken;
    }

    public function register($username, $password, $repeat)
    {
        if (empty($username) || empty($password) || empty($repeat)) {
            return '<script> swal({ title: "Something went wrong!", text: "Please fill all fields!", icon: "error",  }).then(function(){ 
                location.replace("");
                }
             ); </script>';
        }

        if ($password !== $repeat) {
            return '<script> swal({ title: "Something went wrong!", text: "The confirm password confirmation does not match.", icon: "error", }).then(function(){ 
                location.replace("");
                }
             ); </script>';
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

        $result = $this->db->getLogin($this->username, $this->password);

        if ($result == '0 results found!') {
            return '<script> swal({ title: "Something went wrong!", text: "The confirm password confirmation does not match.", icon: "error", }).then(function(){ 
                location.replace("");
                }
             ); </script>';
        } else {
            return '<script> swal({ title: "Good job!", text: "Successfully logged in!", icon: "success", }).then(function(){ 
                location.replace("");
                }
             ); </script>';
        }
    }
    public function logout()
    {
        session_destroy();
        session_regenerate_id(true);
        return '<script> swal({ title: "Good job!", text: "Successfully logged out!", icon: "success", }); </script>';
    }
}