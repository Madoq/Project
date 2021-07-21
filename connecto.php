<?php

require 'connect.php';
function connect($host,$database,$user,$password){
    
    $dsn = "mysql:host=$host;dbname=$database;charset=UTF8";
	try
     {
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		return new PDO($dsn, $user, $password, $options);
    }
    catch (PDOException $error)
    {
        echo $error->getMessage();
        exit('Database error');
    }
}
return connect($host,$database,$user,$password);