<?php

require_once '../php_backend/functions.php';
require_once '../php_backend/headers.php';

try {
    $db = createDbConnection();
    selectAsJson($db, "select * from category");
} catch (PDOException $pdoex) {
    returnError($pdoex);

}