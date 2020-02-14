<?php 

    $host = "localhost";
    $db   = "crud-with-login";

try{

    $connection = new PDO("mysql:host=localhost;dbname=crud-with-login","root","");

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
}
catch(Exception $e){

    echo $e->getMessage() ; 
}

include_once 'crudClass.php';

$crud = new Crud($connection);


?>