<?php

function cart()
{
    // Array = 'artikel ID' => 'aantal in winkelmandje'
    $arg = ['3' => '1', '14' => '6', '69' => '2', '111' => '3'];

    
    View::show('cart/index', $arg);
}
