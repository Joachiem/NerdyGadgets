<?php

class Auth
{

    /**
     * login
     */
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
    }


    /**
     * register
     */
    public static function register()
    {
        $_SESSION['register']["loginfail"] = true;

        if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) return Route::redirect('/register');

        //hashing password
        $hashed_password = hash("sha256", $_POST["password"] . 'y80HoN9I');

        $u = $_POST['username'];
        $result = DB::execute('select PersonId from People where EmailAddress = ?', [$_POST['email']]);

        if (isset($result[0]->PersonId)) return Route::redirect('/register');

        DB::execute($GLOBALS['q']['register'], [$u, $u, $u, $hashed_password, $_POST['email'], date("d/m/Y h:i:sa")]);

        unset($_SESSION['register']["loginfail"]);

        return Route::redirect('/profile');
    }
}
