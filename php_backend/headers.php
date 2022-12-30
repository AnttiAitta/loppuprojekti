<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Acces-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header("Acces-Control-Allow-Credentials: true");
    header("Acces-Control-Max-Age: 86400");
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCES_CONTROL_REQUEST_METHOD']))
    header("Acces-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCES_CONTROL_REQUEST_HEADERS']))
    header("Acces-Control-Allow-Headers: {$_SERVER['HTTP_ACCES_CONTROL_REQUEST_HEADERS']}");

    exit;
}
