<?php

class Auth
{
    public static function login()
    {
        //old email gets saved/merged whith new email
        $data = $_POST;
        unset($data['submit']);
        if (empty($_SESSION['login'])) {
            $_SESSION['login'] = $data;
        } else {
            $_SESSION['login'] = array_merge($_SESSION['login'], $data);
        }

        //generate errormessages when fields are empty
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

            Route::redirect('/login');
        }
        
        unset($_SESSION['login']['error_messages']);

        //hashing password
        $password = $_POST["password"] . "y80HoN9I";
        $hash = hash("sha256", $password);
        $email = $_POST["email"];
        $result = DB::execute('select PersonID, FullName, EmailAddress, HashedPassword from people where EmailAddress = "?" AND HashedPassword = "?"', [$email, $hash]);

        //check if email and password are correct
        if (empty($result)) {
            $_SESSION["loginfail"] = true;
            Route::redirect('/login');
        } else {
            $_SESSION["loginfail"] = false;
            $_SESSION['user'] = array('id' => $result->PersonID, 'naam' => $result->FullName);
            Route::redirect('/profile');
        } 
    } public static function register()
    {
        //old email gets saved/merged whith new email
        $data = $_POST;
        unset($data['submit']);
        if (empty($_SESSION['register'])) {
            $_SESSION['register'] = $data;
        } else {
            $_SESSION['register'] = array_merge($_SESSION['register'], $data);
        }

        //generate errormessages when fields are empty
        unset($_SESSION['register']['error_messages']);
        $error_messages = [];
        $register_fields = [
            'username' => 'Gebruikersnaam',
            'email' => 'Email invullen',
            'password' => 'Wachtwoord invullen',
            'repeatpassword' => 'Wachtwoord herhalen'
        ];

        if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["repeatpassword"])) {
            foreach ($register_fields as $register_fields => $error) {
                if (empty($_POST[$register_fields])) {
                    $error_messages[$register_fields] = $error;
                }
            }

            $_SESSION['register']['error_messages'] = $error_messages;

            Route::redirect('/register');
        }
        
        unset($_SESSION['register']['error_messages']);


        //hashing password
        $password = $_POST["password"] . "y80HoN9I";
        $hash = hash("sha256", $password);
        $email = $_POST["email"];
        $result = DB::execute ("INSERT INTO people (FullName, EmailAddress, HashedPassword, PreferredName, SearchName, IsExternalLogonProvider, IsPermittedToLogon, IsSystemUser, IsEmployee, IsSalesperson, LastEditedBy, ValidFrom, ValidTo) VALUES (?, ?, ?, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0 '9999-12-31 23:59:59')");

        //check if email and password are correct
        if (empty($result)) {
            $_SESSION["registerfail"] = true;
            Route::redirect('/register');
        } else {
            $_SESSION["registerfail"] = false;
            $_SESSION['user'] = array('naam' => $result->FullName, 'email' => $result->EmailAddress);
            Route::redirect('/profile');
        } 
    }  
}


