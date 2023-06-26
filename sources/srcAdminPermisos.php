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

$sql = "SELECT * FROM universityusers";
$result = mysqli_query($conn, $sql);
?>

<div class="d-flex justify-content-between">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-success">Copy</button>
        <button type="button" class="btn btn-success">Excel</button>
        <button type="button" class="btn btn-success">PDF</button>
        <button type="button" class="btn btn-success">Column Visibility</button>
    </div>
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
                <th scope="col">Email/Usuario</th>
                <th scope="col">Permiso</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $email = $row["email"];
                $permiso = $row["permiso"];
                $estado = $row["estado"];
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $email; ?></td>
                    <td class="text-center">
                        <?php
                        if ($permiso == 1) {
                            echo "<p class='bg-warning my-auto px-1 rounded-1'>Administrador</p>";
                        } else if ($permiso == 2) {
                            echo "<p class='bg-info my-auto px-1 rounded-1 text-white'>Maestro</p>";
                        } else {
                            echo "<p class='bg-secondary my-auto px-1 rounded-1 text-white'>Alumno</p>";
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        if ($row["estado"] == 1) {
                            echo "<p class='bg-success my-auto px-1 rounded-1 text-white'>Activo</p>";
                        } else {
                            echo "<p class='bg-danger my-auto px-1 rounded-1 text-white'>Inactivo</p>";
                        }
                        ?>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="btn-link" style="color: #17a2b8" data-bs-toggle="modal" data-bs-target="#adminPermisosModal<?php echo $email; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="adminPermisosModal<?php echo $email; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content shadow-lg">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Permiso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="../controller/ctrlrAdminPermisos.php">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email del Usuario</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="inputAdminEmailPermisos" value="<?php echo $email; ?>" readonly>
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rolUsuario" class="form-label">Rol de Usuario</label>
                                        <select name="inputAdminRolPermisos" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="rolUsuario">
                                            <option value="1" <?php if ($permiso == 1) echo 'selected'; ?>>Administrador</option>
                                            <option value="2" <?php if ($permiso == 2) echo 'selected'; ?>>Maestro</option>
                                            <option value="3" <?php if ($permiso == 3) echo 'selected'; ?>>Alumno</option>
                                        </select>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="inputAdminEstadoPermisos" <?php if ($estado == 1) echo 'checked'; ?>>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Usuario Activo</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Guardar Cambios" name="buttonAdminPermisos"></input>
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