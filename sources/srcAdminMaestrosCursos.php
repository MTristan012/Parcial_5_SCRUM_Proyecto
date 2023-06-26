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

$sql = "SELECT * FROM universitycursos WHERE `maestro` = '' OR `maestro` IS NULL;";
$result = mysqli_query($conn, $sql);
?>

<label for="rolUsuario" class="form-label">Clase Asignada</label>
<select name="inputAdminMaestrosCursos" class="form-select form-select-lg mb-3">
        <option value="" selected>Sin Asignar</option>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $clase = $row["clase"];
    ?>
        <option value="<?php echo $row["clase"]; ?>"><?php echo $row["clase"]; ?></option>
    <?php
    }
    ?>
</select>