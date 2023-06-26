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

$dni = $_POST['inputAdminDNIAlumnos'];
$email = $_POST['inputAdminEmailAlumnos'];
$name = $_POST['inputAdminNombreAlumnos'];
$direccion = $_POST['inputAdminDireccionAlumnos'];
$date = $_POST['inputAdminFechaAlumnos'];
$id = $_POST['inputAdminIDAlumnos'];


$sql = "UPDATE universityusers SET nombre = '$name', direccion = '$direccion', fechaDeNacimiento = '$date', dni = '$dni' WHERE id = '$id' ";
if (mysqli_query($conn, $sql)) {
    header("Location: ../views/adminAlumnos.view.php");
    exit;
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
    header("Location: ../views/adminAlumnos.view.php");
    exit;
}

?>