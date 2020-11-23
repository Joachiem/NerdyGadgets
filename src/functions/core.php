<?php

function cookie_clicked()
{
    setcookie('cookie', true, time() + (86400 * 30 * 365), "/");
    http_response_code(204);
}
