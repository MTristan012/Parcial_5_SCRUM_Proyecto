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

$sql = "SELECT * FROM `proyecto`.`universitycursos`;";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM universityusers WHERE `permiso` = 2 AND (`claseAsignada` IS NULL OR `claseAsignada` = '') ";
$result2 = mysqli_query($conn, $sql2);

?>

<div class="d-flex justify-content-between">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-success">Copy</button>
        <button type="button" class="btn btn-success">Excel</button>
        <button type="button" class="btn btn-success">PDF</button>
        <button type="button" class="btn btn-success">Column Visibility</button>
    </div>
    <?php
    if (isset($_GET['alert'])) {
        $alert = $_GET['alert'];
        if ($alert == 'success') {
            echo "<div class='alert alert-success text-center my-auto py-0'>Insertion successful!</div>";
        } elseif ($alert == 'error') {
            echo "<div class='alert alert-danger text-center my-auto py-0'>Error al insertar los Datos</div>";
        } elseif ($alert == 'empty') {
            echo "<div class='alert alert-danger text-center my-auto py-0'>Llene el Formulario</div>";
        }
    }
    ?>
    <div>
        <div class="form d-flex">
            <p class="my-auto me-2">Search: </p>
            <input class="form-control" id="floatingTextarea2" style="box-shadow: none;"></input>
        </div>
    </div>
</div>
<div class="mt-3">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Clase</th>
                <th scope="col">Maestro</th>
                <th scope="col">Alumnos Inscritos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $x = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $clase = $row["clase"];
                $maestro = $row["maestro"];
                $alumnos = $row["alumnos"];
                $id = $row["id"];
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
                        echo $row["clase"];
                        ?>
                    </td>
                    <td>
                        <?php
                        echo $row["maestro"];
                        ?>
                    </td>
                    <td>
                        <?php
                        $cantidadIns = "SELECT COUNT(*) FROM universityinscriptions WHERE nombreClase = '$clase' ;";
                        $result3 = mysqli_query($conn, $cantidadIns);
                        if ($result3) {
                            $fila = mysqli_fetch_array($result3);
                            $cantidad = $fila[0];
                            echo $cantidad;
                        } else {
                            echo "Error en la consulta: " . mysqli_error($conn);
                        }
                        ?>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="btn-link" style="color: #17a2b8" data-bs-toggle="modal" data-bs-target="#adminCursoModal<?php echo $id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            <a type="button" class="btn-link ms-2" style="color: #dc3545" data-bs-toggle="modal" data-bs-target="#adminCursoModalDelete<?php echo $id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="adminCursoModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content shadow-lg">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Clase</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="../controller/ctrlrAdminCursosEditar.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre de la Materia</label>
                                        <input type="text" class="form-control" name="inputAdminNombreCursos" value="<?php echo $clase; ?>">
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label class="form-label">Old Maestro</label>
                                        <input type="text" class="form-control" name="inputAdminOldMaestroCurso" value="<?php echo $maestro; ?>">
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label class="form-label">ID</label>
                                        <input type="text" class="form-control" name="inputAdminIDCursos" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rolUsuario" class="form-label">Maestro Asignado</label>
                                        <select name="inputAdminMaestrosCursos" class="form-select form-select-lg mb-3">
                                            <option value="<?php echo $maestro ? $maestro : NULL; ?>" selected><?php echo $maestro ? $maestro : "Sin Asignacion"; ?></option>
                                            <?php
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                            ?>
                                                <option value="<?php echo $row2["nombre"]; ?>"><?php echo $row2["nombre"]; ?></option>
                                            <?php
                                            }
                                            mysqli_data_seek($result2, 0);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar Cambios" name="buttonAdminCursos"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="adminCursoModalDelete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content shadow-lg">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar Clase</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="../controller/ctrlrAdminDeleteCursos.php">
                                <div class="modal-body">
                                    <div class="alert alert-danger" role="alert">
                                        Esta Accion es Irreversible, desea continuar?
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label class="form-label">ID</label>
                                        <input type="text" class="form-control" name="inputAdminIDCursos" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label class="form-label">Old Maestro</label>
                                        <input type="text" class="form-control" name="inputAdminOldMaestroCursos" value="<?php echo $maestro; ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-danger" value="Borrar" name="buttonAdminCursosDelete"></input>
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