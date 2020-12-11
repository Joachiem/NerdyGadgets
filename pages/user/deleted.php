<?php
$invoice_ids = DB::execute('SELECT InvoiceID FROM invoices where CustomerID = ?', [$_SESSION['user']->PersonID]);

$invoice_ids_array = array_filter($invoice_ids);
if (!empty($invoice_ids_array)) {
    $ids = [];
    foreach ($invoice_ids as $invoice_id) {
        $ids[] = $invoice_id->InvoiceID;
    }
    $ids = implode(', ', array_values($ids));

    DB::execute('DELETE from invoicelines where InvoiceID IN ($1)', [], [$ids]);
    DB::execute('DELETE from invoices where CustomerID = ?', [$_SESSION['user']->PersonID]);
}

DB::execute('DELETE from customers where CustomerID = ?', [$_SESSION['user']->PersonID]);
DB::execute('DELETE from people where PersonID = ?', [$_SESSION['user']->PersonID]);

unset($_SESSION['user']);
Route::redirect('/account_deleted_succesfully');
