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

$id = $_POST['inputAlumnoIDCursos'];

$sql = "DELETE FROM `universityinscriptions` WHERE `universityinscriptions`.`id` = '$id' ";

if (mysqli_query($conn, $sql)) {
    header("Location: ../views/alumnoClases.view.php");
    exit;
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
    header("Location: ../views/alumnoClases.view.php");
    exit;
}
?>