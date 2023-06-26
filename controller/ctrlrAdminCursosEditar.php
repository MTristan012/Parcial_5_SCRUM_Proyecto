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
$name = $_POST['inputAdminNombreCursos'];
$maestro = $_POST['inputAdminMaestrosCursos'];
$oldMaestro = $_POST['inputAdminOldMaestroCurso'];

if ($maestro) {

    if ($maestro == $oldMaestro) {
        $sql = "UPDATE universitycursos SET clase = '$name', maestro = '$maestro' WHERE id = '$id' ";
        $sqlU = "UPDATE universityusers SET claseAsignada = '$name' WHERE nombre = '$maestro' ";

        if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlU)) {
            header("Location: ../views/adminClases.view.php");
            exit;
        } else {
            echo "Error al insertar el registro: " . mysqli_error($conn);
            header("Location: ../views/adminClases.view.php");
            exit;
        }
    } else {
        $sql = "UPDATE universitycursos SET clase = '$name', maestro = '$maestro' WHERE id = '$id' ";
        $sqlU = "UPDATE universityusers SET claseAsignada = '$name' WHERE nombre = '$maestro' ";
        $sqlX = "UPDATE universityusers SET claseAsignada = NULL WHERE nombre = '$oldMaestro' ";

        if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlU) and mysqli_query($conn, $sqlX)) {
            header("Location: ../views/adminClases.view.php");
            exit;
        } else {
            echo "Error al insertar el registro: " . mysqli_error($conn);
            header("Location: ../views/adminClases.view.php");
            exit;
        }
    }
    
} else {
    $sql = "UPDATE universitycursos SET clase = '$name', maestro = '$maestro' WHERE id = '$id' ";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../views/adminClases.view.php");
        exit;
    } else {
        echo "Error al insertar el registro: " . mysqli_error($conn);
        header("Location: ../views/adminClases.view.php");
        exit;
    } 
}

?>