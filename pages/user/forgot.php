<?php
 /**
     * login a user
     * @return Route::redirect()
     */
    public static function delete()
    {
        $error_messages = [];
        unset($_SESSION['login']['error_messages']);

        $form_fields = [
            'email' => [
                $GLOBALS['t']['fill-email'] => function ($f) {
                    return empty($f);
                },
            ],
            'password' => [
                $GLOBALS['t']['fill-password'] => function ($f) {
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
            return Route::redirect('/login');
        }

        unset($_SESSION['login']['form']);

        $_SESSION['user'] = $result[0];

        return Route::redirect('/profile');
    }
?>