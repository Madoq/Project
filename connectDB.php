<?php

require_once 'connect.php';
$dsn = "mysql:host=$host;dbname=$database;charset=UTF8";
try 
{
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $db = new PDO($dsn, $user, $password, $options);
}
catch (PDOException $error)
{
    echo $error->getMessage();
    exit('Database error');
}
