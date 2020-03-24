<?php
$username = 'root';
$dsn = 'mysql:host=localhost; dbname=register';
$pass ='';
try{
    $db = new PDO($dsn, $username, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    echo "Connection failed ".$ex->getMessage();
}