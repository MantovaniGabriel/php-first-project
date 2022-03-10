<?php
    $dbHost     = 'localhost';
    $dbUser     = 'root';
    $dbPassword = '';
    $dbName     = 'Control';

    $conect = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    
    //if($conect->connect_errno){
    //    echo "Algum erro foi encontrado";
    //}else{
    //    echo "Conectado com sucesso<br>";
    //}
?>