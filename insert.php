<?php
session_start();
$pdo = require_once 'connecto.php';
$results = $_SESSION['Volume'];
$user_ID = $_SESSION['logged_id'];
$sql = ('INSERT INTO results VALUES (NULL,:User_ID,:Outcome)');
$statement = $pdo->prepare($sql);
$statement->execute([
    ':User_ID' =>$user_ID,
    ':Outcome' =>$results
]);
echo 'The User id ' . $user_ID . ' was inserted';