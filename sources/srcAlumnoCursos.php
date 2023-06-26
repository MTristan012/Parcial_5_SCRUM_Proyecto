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
    <div class="card-header">Tus Materias Inscritas</div>
    <div class="card-body">
        <div class="mt-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Darse de Baja</th>
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
                                    <a type="button" class="btn-link ms-2" style="color: #dc3545" data-bs-toggle="modal" data-bs-target="#alumnoCursoModalDelete<?php echo $id; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z" />
                                            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="alumnoCursoModalDelete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content shadow-lg">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar Clase</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<div class="card shadow-sm">
    <div class="card-header">Materias para inscribir</div>
    <div class="card-body">
        <form action="../controller/ctrlrAlumnoInscribir.php" method="POST">
            <label for="" class="mb-3">Selecciona la(s) Clase(s) a Inscribirte</label>
            <select class="form-select" multiple aria-label="multiple select example" name="selectAlumnoInscribir">
                <?php
                while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                    <option value="<?php echo $row2["clase"] . " " . $row2["id"]; ?>"><?php echo $row2["clase"]; ?></option>
                <?php
                }
                ?>
            </select>
            <div class=" mt-3 d-flex justify-content-end">
                <input type="submit" class="btn btn-primary" name="buttonAlumnoInscribir" value="Inscribir">
            </div>
        </form>
    </div>
</div>