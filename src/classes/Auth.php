<?php

class Auth
{

    /**
     * login a user
     * @return Route::redirect()
     */
    public static function login()
    {
        $error_messages = [];
        unset($_SESSION['login']['error_messages']);

        $form_fields = [
            'email' => [
                'email invullen' => function ($f) {
                    return empty($f);
                },
            ],
            'password' => [
                'password invullen' => function ($f) {
                    return empty($f);
                },
            ],
        ];

        foreach ($form_fields as $form_field => $validators) {
            foreach ($validators as $error => $validator) {
                if ($validator($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }
        }

        $_SESSION['login']['form'] = $_POST;

        if ($error_messages) {
            $_SESSION['login']['error_messages'] = $error_messages;
            return Route::redirect('/login');
        }


        //hashing password
        $hashed_password = hash('sha256', $_POST['password'] . 'y80HoN9I');
        $result = DB::execute('select PersonID, FullName, EmailAddress from people where EmailAddress = ? AND HashedPassword = ?', [$_POST['email'], $hashed_password]);

        //check if email and password are correct
        if (empty($result)) {
            $_SESSION['login']['error_messages']['password'] = 'inlog wrong';
            return Route::redirect('/login');
        }

        $_SESSION['user'] = $result[0];

        return Route::redirect('/profile');
    }


    /**
     * register a user and login the user
     * @return Route::redirect()
     */
    public static function register()
    {
        $u = $_POST['username'];
        $error_messages = [];
        unset($_SESSION['register']['error_messages']);

        $form_fields = [
            'username' => [
                'username more than 8' => function ($f) {
                    return strlen($f) <= 8;
                },
                'username invullen' => function ($f) {
                    return empty($f);
                },
            ],
            'email' => [
                'email format' => function ($f) {
                    $email_pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

                    return !preg_match($email_pattern, $f);
                },
                'email invullen' => function ($f) {
                    return empty($f);
                },
            ],
            'password' => [
                'password more than 8' => function ($f) {
                    return strlen($f) <= 8;
                },
                'password invullen' => function ($f) {
                    return empty($f);
                },
            ],
        ];

        foreach ($form_fields as $form_field => $validators) {
            foreach ($validators as $error => $validator) {
                if ($validator($_POST[$form_field])) {
                    $error_messages[$form_field] = $error;
                }
            }
        }

        $_SESSION['register']['form'] = $_POST;

        if ($error_messages) {
            $_SESSION['register']['error_messages'] = $error_messages;
            return Route::redirect('/register');
        }

        //hashing password
        $hashed_password = hash('sha256', $_POST['password'] . 'y80HoN9I');

        // check if the email is alrady taken
        $result = DB::execute('select PersonId from People where EmailAddress = ?', [$_POST['email']]);
        if (isset($result[0]->PersonId)) {
            $_SESSION['register']['error_messages']['email'] = 'this email is taken';
            return Route::redirect('/register');
        }

        // add the person to the database
        DB::execute($GLOBALS['q']['register'], [$u, $u, $u, $hashed_password, $_POST['email'], date('d/m/Y h:i:sa')]);

        self::login();

        return Route::redirect('/profile');
    }


    /**
     * register
     */
    public static function logout()
    {
        unset($_SESSION['user']);
        return Route::redirect('/');
    }
}
