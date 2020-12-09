<?php

$result = DB::execute('DELETE from people where PersonID=?', [$_SESSION['user']->PersonID]);
unset($_SESSION['user']);
Route::redirect('/account_deleted_succesfully');


?>