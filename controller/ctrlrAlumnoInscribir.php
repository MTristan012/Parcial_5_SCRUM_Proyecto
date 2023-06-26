<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "proyecto";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (!empty($_POST['selectAlumnoInscribir'])) {
    $cursoNombreID = $_POST['selectAlumnoInscribir'];
    $nombreAlumno = $_SESSION["nombre"];
    $idAlumno = $_SESSION['id'];
    $cursoArray = explode(" ", $cursoNombreID);
    $cursoNombre = $cursoArray[0];
    $cursoID = $cursoArray[1];

    $sql = "INSERT INTO universityinscriptions (idAlumno, IdClase, nombreClase, nombreAlumno) VALUES ('$idAlumno', '$cursoID', '$cursoNombre', '$nombreAlumno')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../views/alumnoClases.view.php?alert=success");
        exit;
    } else {
        header("Location: ../views/alumnoClases.view.php?alert=error");
        exit;
    }

} else {
    header("Location: ../views/alumnoClases.view.php?alert=empty");
    exit;
}

?>