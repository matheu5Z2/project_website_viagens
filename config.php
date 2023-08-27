<?php

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $dbname = "cad_site_passagens";
    $port = 3306;

    $connLog = new PDO("mysql:host=$servidor;port=$port;dbname=" . $dbname, $usuario, $password);
    $conn = mysqli_connect($servidor, $usuario, $password, $dbname)

?>