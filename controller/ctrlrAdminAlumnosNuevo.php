<?php
if (!empty($_POST['inputAdminButtonAlumno'])) {
    if (!empty($_POST['inputAdminDNIAlumno']) && !empty($_POST['inputAdminEmailAlumno']) && !empty($_POST['inputAdminNombreAlumno']) && !empty($_POST['inputAdminApellidoAlumno']) && !empty($_POST['inputAdminDireccionAlumno']) && !empty($_POST['inputAdminFechaAlumno'])) {

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");

        if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        
        $dni = $_POST['inputAdminDNIAlumno'];
        $email = $_POST['inputAdminEmailAlumno'];
        $name = $_POST['inputAdminNombreAlumno'];
        $apellido = $_POST['inputAdminApellidoAlumno'];
        $direccion = $_POST['inputAdminDireccionAlumno'];
        $fecha = $_POST['inputAdminFechaAlumno'];
        $fullName = $name . " " . $apellido;
        $permiso = 3;
        $password = "alumno";
        $estado = 1;
        
        $sql = "INSERT INTO universityusers (email, password, permiso, estado, nombre, direccion, fechaDeNacimiento, dni) VALUES ('$email', '$password', '$permiso', '$estado', '$fullName', '$direccion', '$fecha', $dni)";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../views/adminAlumnos.view.php?alert=success");
            exit;
        } else {
            header("Location: ../views/adminAlumnos.view.php?alert=error");
            exit;
        }
    } else {
        header("Location: ../views/adminAlumnos.view.php?alert=empty");
        exit;
    }
}
?>