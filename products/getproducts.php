<?php

require_once '../php_backend/functions.php';
require_once '../php_backend/headers.php';

$uri = parse_url(filter_input(INPUT_SERVER, 'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$category_id = $parameters[1];

try {
    $db = createDbConnection();
    $sql = "SELECT * FROM category WHERE id = $category_id";
    $query = $db->query($sql);
    $category = $query->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM product WHERE category_id = $category_id";
    $query = $db->query($sql);
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    header('HTTP/1.1 200 OK');
    echo json_encode(array(
        "category" => $category['name'],
        "products" => $products
    ),JSON_PRETTY_PRINT);
} catch (PDOException $pdoex) {
 returnError($pdoex);
}