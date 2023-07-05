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

$idSession = $_SESSION["id"];

$sql = "SELECT * FROM `universityinscriptions` WHERE idAlumno = '$idSession' ";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM `universitycursos` WHERE NOT EXISTS (SELECT * FROM `universityinscriptions` WHERE `universitycursos`.`clase` = `universityinscriptions`.`nombreClase` AND `universityinscriptions`.`idAlumno` = '$idSession'); ";
$result2 = mysqli_query($conn, $sql2);

?>

<div class="card shadow-sm col-8 col-lg-10">
    <div class="card-header">Revisa tus tareas</div>
    <div class="card-body">
        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Descargar Examen</th>
                        <th scope="col">Subir Examen</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $x = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $idAlumno = $row["idAlumno"];
                        $idClase = $row["idClase"];
                        $nombreClase = $row["nombreClase"];
                        $nombreAlumno = $row["nombreAlumno"];
                    ?>
                        <tr>
                            <td>
                                <?php
                                echo $x;
                                $x++;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $row["nombreClase"];
                                ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button>Descargar</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button>Subir</button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="alumnoCursoModalDelete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content shadow-lg">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar Clase</h1>
                                        <button type="button" class="btn-info" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="../controller/ctrlrAlumnoDeleteCurso.php">
                                        <div class="modal-body">
                                            <div class="alert alert-danger" role="alert">
                                                Esta Accion es Irreversible, desea continuar?
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="inputAlumnoIDCursos" value="<?php echo $id; ?>">
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label class="form-label">IDAlumno</label>
                                                <input type="text" class="form-control" name="inputAlumnoIDACursos" value="<?php echo $idAlumno; ?>">
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label class="form-label">IDAlumno</label>
                                                <input type="text" class="form-control" name="inputAlumnoIDCCursos" value="<?php echo $idClase; ?>">
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label class="form-label">nombreAlumno</label>
                                                <input type="text" class="form-control" name="inputAlumnoNACursos" value="<?php echo $nombreAlumno; ?>">
                                            </div>
                                            <div class="mb-3" hidden>
                                                <label class="form-label">nombreClase</label>
                                                <input type="text" class="form-control" name="inputAlumnoNCCursos" value="<?php echo $nombreClase; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-danger" value="Borrar" name="buttonAlumnoCursosDelete"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
