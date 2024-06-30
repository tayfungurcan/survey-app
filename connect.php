<?php
try{
    $databaseConnection = new PDO("mysql:host=localhost;dbname=survey_application;charset=UTF8", "root", "");
} catch (PDOException $error){
    echo $error->getMessage();
    die();
}


function filter($value){
    $one    = trim($value);
    $two    = strip_tags($one);
    $three  = htmlspecialchars($two, ENT_QUOTES);
    $result = $three;
    return $result;
}

$IPAddress       = $_SERVER["REMOTE_ADDR"];
$timeStamp      = time();
$votingLimit    = 86400;
$turnBackTime   = $timeStamp-$votingLimit;
?>