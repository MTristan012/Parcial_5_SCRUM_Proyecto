<?php

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "proyecto";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $conn->set_charset("utf8");

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
?>