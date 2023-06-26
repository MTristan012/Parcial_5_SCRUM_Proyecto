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

$email = $_POST['inputAdminEmailPermisos'];
$rol = $_POST['inputAdminRolPermisos'];
if(empty($_POST['inputAdminEstadoPermisos'])){
    $estado = 0;
}else{
    $estado = 1;
}

$sql = "UPDATE universityusers SET permiso = '$rol', estado = '$estado' WHERE email = '$email' ";
if (mysqli_query($conn, $sql)) {
    header("Location: ../views/adminPermisos.view.php");
    exit;
} else {
    echo "Error al insertar el registro: " . mysqli_error($conn);
    header("Location: ../views/adminPermisos.view.php");
    exit;
}
?>