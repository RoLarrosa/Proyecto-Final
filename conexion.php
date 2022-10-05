<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
    } catch(Exception $ex){
        echo "La conexión falló: " . $ex->getMessage();  
        exit;      
    }

?>