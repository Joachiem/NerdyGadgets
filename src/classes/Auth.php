<?php

class Auth
{

    /**
     * login a user
     * @return Route::redirect()
     */
    public static function login()
    {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $_SESSION['login']['loginfail'] = true;

        // check if email and password are filled
        if (empty($email) || empty($password)) return Route::redirect('/login');

        //hashing password
        $hashed_password = hash('sha256', $password . 'y80HoN9I');
        $result = DB::execute('select PersonID, FullName, EmailAddress from people where EmailAddress = ? AND HashedPassword = ?', [$email, $hashed_password]);

        //check if email and password are correct
        if (empty($result)) return Route::redirect('/login');

        unset($_SESSION['login']['loginfail']);
        $_SESSION['user'] = $result[0];

        return Route::redirect('/profile');
    }


    /**
     * register a user and login the user
     * @return Route::redirect()
     */
    public static function register()
    {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $_SESSION['register']['loginfail'] = true;

        if (empty($username) || empty($email) || empty($password)) return Route::redirect('/register');

        //hashing password
        $hashed_password = hash('sha256', $password . 'y80HoN9I');

        // check if the email is alrady taken
        $result = DB::execute('select PersonId from People where EmailAddress = ?', [$email]);
        if (isset($result[0]->PersonId)) return Route::redirect('/register');

        // add the person to the database
        DB::execute($GLOBALS['q']['register'], [$username, $username, $username, $hashed_password, $email, date('d/m/Y h:i:sa')]);

        unset($_SESSION['register']['loginfail']);

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
