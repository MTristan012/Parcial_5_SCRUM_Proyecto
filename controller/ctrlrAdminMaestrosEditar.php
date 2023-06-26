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

$email = $_POST['inputAdminEmailMaestros'];
$name = $_POST['inputAdminNombreMaestros'];
$direccion = $_POST['inputAdminDireccionMaestros'];
$date = $_POST['inputAdminFechaMaestros'];
$id = $_POST['inputAdminIDMaestros'];

$oldCurso = $_POST['inputAdminOldCursoMaestros'];
$curso = $_POST['inputAdminMaestrosCursos'];
if ($curso) {
    $sql = "UPDATE universityusers SET nombre = '$name', direccion = '$direccion', fechaDeNacimiento = '$date', claseAsignada = '$curso' WHERE id = '$id' ";
    $sqlU = "UPDATE universitycursos SET maestro = '$name' WHERE clase = '$curso' ";
    $sqlX = "UPDATE universitycursos SET maestro = NULL WHERE clase = '$oldCurso' ";
    if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlU) and mysqli_query($conn, $sqlX)) {
        header("Location: ../views/adminMaestros.view.php");
        exit;
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conn);
        header("Location: ../views/adminMaestros.view.php");
        exit;
    }
} else{
    $sql = "UPDATE universityusers SET nombre = '$name', direccion = '$direccion', fechaDeNacimiento = '$date', claseAsignada = '$curso' WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../views/adminMaestros.view.php");
        exit;
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conn);
        header("Location: ../views/adminMaestros.view.php");
        exit;
    }
}

?>