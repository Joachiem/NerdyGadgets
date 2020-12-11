<?php

DB::execute('DELETE from invoicelines where PersonID=?', [$_SESSION['user']->PersonID]);
DB::execute('DELETE from people where PersonID=?', [$_SESSION['user']->PersonID]);
DB::execute('DELETE from customers where CustomerID=?', [$_SESSION['user']->PersonID]);
DB::execute('DELETE from people where PersonID=?', [$_SESSION['user']->PersonID]);

unset($_SESSION['user']);
Route::redirect('/account_deleted_succesfully');


?>