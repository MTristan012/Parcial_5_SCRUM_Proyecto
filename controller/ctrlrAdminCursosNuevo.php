<?php
if (!empty($_POST['inputAdminButtonCurso'])) {
    if (!empty($_POST['inputAdminNombreCurso'])) {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        
        $name = $_POST['inputAdminNombreCurso'];
        $maestro = $_POST['inputAdminCursosMaestros'];

        if ($maestro) {
            $sql = "INSERT INTO universitycursos (clase, maestro) VALUES ('$name', '$maestro')";
            $sqlU = "UPDATE universityusers SET claseAsignada = '$name' WHERE nombre = '$maestro' ";

            if (mysqli_query($conn, $sql) and mysqli_query($conn, $sqlU)) {
                header("Location: ../views/adminClases.view.php?alert=success");
                exit;
            } else {
                header("Location: ../views/adminClases.view.php?alert=error");
                exit;
            }
        } else{
            $sql = "INSERT INTO universitycursos (clase) VALUES ('$name')";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../views/adminClases.view.php?alert=success");
                exit;
            } else {
                header("Location: ../views/adminClases.view.php?alert=error");
                exit;
            }
        }
        
    } else {
        header("Location: ../views/adminClases.view.php?alert=empty");
        exit;
    }
}
?>