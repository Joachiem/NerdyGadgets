<?php

class Auth
{
    public static function register()
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
        //$password = $_POST["password"] . "y80HoN9I";
       // $hash = hash("sha256", $password);
        //$email = $_POST["email"];
        //$result = DB::execute('select PersonID, FullName, EmailAddress, HashedPassword from people where EmailAddress = "?" AND HashedPassword = "?"', [$email, $hash]);

        //check if email and password are correct
        //if (empty($result)) {
           // $_SESSION["registerfail"] = true;
           // Route::redirect('/register');
        //} else {
          //  $_SESSION["registerfail"] = false;
         //   $_SESSION['user'] = array('id' => $result->PersonID, 'naam' => $result->FullName);
          //  Route::redirect('/profile');
       // } 
    } 
}


