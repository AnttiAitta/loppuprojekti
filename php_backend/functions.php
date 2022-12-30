<?php

function createDbConnection(){
    $ini = parse_ini_file("../myconf.ini");
    $host = $ini["host"];
    $dbname = $ini["database"];
    $username = $ini["username"];
    $password = $ini["password"];

    try{
        $dbcon = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        return $dbcon;
    }catch(PDOException $e){
        http_response_code(505);
        echo "Service is currently unavailable";
    }

    return null;
}

function selectAsJson(object $db,string $sql): void {
  $query = $db->query($sql);
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
  header('HTTP/1.1 200 OK');
  echo json_encode($results,JSON_PRETTY_PRINT);
}

function selectRowAsJson(object $db,string $sql): void {
  $query = $db->query($sql);
  $results = $query->fetch(PDO::FETCH_ASSOC);
  header('HTTP/1.1 200 OK');
  echo json_encode($results);
}
 
  function executeInsert(object $db,string $sql): int {
    $query = $db->query($sql);  
    return $db->lastInsertId();
  }
  
  function returnError(PDOException $pdoex): void {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    echo json_encode($error);
    exit;
  }