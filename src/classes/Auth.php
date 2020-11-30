<?php

class Auth
{
    public static function login()
    {
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

            Route::redirect('/login');
        }

        unset($_SESSION['login']['error_messages']);

        $password = $_POST["password"] . "y80HoN9I";
        $hash = hash("sha256", $password);
        $email = $_POST["email"];
        $result = DB::execute('select PersonID, FullName, EmailAddress, HashedPassword from people where EmailAddress = "?" AND HashedPassword = "?"', [$email, $hash]);
        print_r($result);

        if (empty($result)) {
            $_SESSION["loginfail"] = true;
            Route::redirect('/login');
        } else {
            $_SESSION["loginfail"] = false;
            $_SESSION['user'] = array('id' => $result->PersonID, 'naam' => $result->FullName);


            Route::redirect('/profile');
        }
    }
}
