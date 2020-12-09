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
                'fill-email' => function ($f) {
                    return empty($f);
                },
            ],
            'password' => [
                'fill-password' => function ($f) {
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
            $_SESSION['login']['error_messages']['password'] = $GLOBALS['t']['emailorpasswordwrong'];
            if (stripos($_SERVER['REQUEST_URI'], 'checkout/login')){
                return Route::redirect('/checkout/login');
            } else {
                return Route::redirect('/login');
            }
        }

        unset($_SESSION['login']['form']);

        $_SESSION['user'] = $result[0];

        if (stripos($_SERVER['REQUEST_URI'], 'checkout/login')){
            return Route::redirect('/checkout/account');
        } else {
            return Route::redirect('/account');
        }
        
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
                'username-length' => function ($f) {
                    return strlen($f) < 8;
                },
                'fill-username' => function ($f) {
                    return empty($f);
                },
            ],
            'email' => [
                'format-email' => function ($f) {
                    $email_pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

                    return !preg_match($email_pattern, $f);
                },
                'fill-email' => function ($f) {
                    return empty($f);
                },
            ],
            'password' => [
                'password-length' => function ($f) {
                    return strlen($f) < 8;
                },
                'fill-password' => function ($f) {
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

        // check if the email is alrady taken and password is null
        $guest = DB::execute('select PersonId from People where EmailAddress = ? and HashedPassword IS NULL', [$_POST['email']]);
        if (isset($guest[0]->PersonId)) {

            // edit the person to the database
            DB::execute('UPDATE People SET HashedPassword = ? WHERE PersonId = ?', [$hashed_password, $guest[0]->PersonId]);

            unset($_SESSION['register']['form']);

            $_POST['password'] = $hashed_password;

            self::login();

            return Route::redirect('/account');
        }

        $user = DB::execute('select PersonId from People where EmailAddress = ?', [$_POST['email']]);
        if (isset($user[0]->PersonId)) {
            $_SESSION['register']['error_messages']['email'] = $GLOBALS['t']['email-taken'];
            return Route::redirect('/register');
        }

        // add the person to the database
        DB::execute($GLOBALS['q']['register'], [$u, $u, $u, $hashed_password, $_POST['email'], date('d/m/Y h:i:sa')]);

        $id = DB::execute('SELECT PersonID FROM people WHERE EmailAddress = ?', [$_POST['email']])[0]->PersonID;
        // add customer
        DB::execute($GLOBALS['q']['set-customer-info'], [$id, $u, $id, $id, date('d/m/Y'), '', '', '', '', '', date('d/m/Y h:i:sa')]);

        unset($_SESSION['register']['form']);

        self::login();

        return Route::redirect('/account');
    }


    /**
     * register
     */
    public static function logout()
    {
        unset($_SESSION['user']);
        return Route::redirect('/');
    }

    /**
     * check if login
     */
    public static function isLogin()
    {
        if (empty($_SESSION['user']->PersonID)) return Route::redirect('/login');
    }
}
