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

$id = $_POST['inputAdminIDCursos'];
$oldMaestro = $_POST['inputAdminOldMaestroCursos'];

$sql = "DELETE FROM `universitycursos` WHERE `universitycursos`.`id` = '$id' ";
$sqlX = "UPDATE universityusers SET claseAsignada = NULL WHERE nombre = '$oldMaestro' ";

if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlX)) {
    header("Location: ../views/adminClases.view.php");
    exit;
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
    header("Location: ../views/adminClases.view.php");
    exit;
}
?>