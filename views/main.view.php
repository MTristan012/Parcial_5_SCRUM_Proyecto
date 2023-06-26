<?php
session_start();
if (empty($_SESSION["id"])) {
    header("Location:./logIn.view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>University</title>
</head>

<body>
    <main class="d-flex">
        <aside class="d-flex flex-column flex-shrink-0 p-3 vh-100" style="background-color: #343a40;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none" style="color:#bec3cc">
                <img src="https://proyectofinaln4.000webhostapp.com/assets/img/logoClose.jpg" alt="logo" class="rounded-circle" width="35rem">
                <span class="fs-5 ms-2">Universidad</span>
            </a>
            <hr class="text-secondary">
            <div style="color:#bec3cc;">
                <?php
                if ($_SESSION['permiso'] == 1) {
                    echo "<p class='m-0 p-0' style='font-size:1.2rem;'>Administrador</p>";
                } else if ($_SESSION['permiso'] == 2) {
                    echo "<p class='m-0 p-0' style='font-size:1.2rem;'>Maestro</p>";
                } else {
                    echo "<p class='m-0 p-0' style='font-size:1.2rem;'>Alumno</p>";
                }
                echo "<p class='m-0 p-0'>" . $_SESSION['nombre'] . "</p>";
                ?>
            </div>
            <hr class="text-secondary">
            <div style="color:#bec3cc;">
                <?php
                if ($_SESSION['permiso'] == 1) {
                    echo "<p class='mb-3 p-3'>MENU ADMINISTRACION</p>";
                    echo '<p><a href="./adminPermisos.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg></span> Permisos</a></p>';
                    echo '<p><a href="./adminMaestros.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace"    viewBox="0 0 16 16">
                        <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                        </svg></span> Maestros</a></p>';
                    echo '<p><a href="./adminAlumnos.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/><path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg></span> Alumnos</a></p>';
                    echo '<p><a href="./adminClases.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a.5.5 0 0 1 .447.276L8.81 1h4.69A1.5 1.5 0 0 1 15 2.5V11h.5a.5.5 0 0 1 0 1h-2.86l.845 3.379a.5.5 0 0 1-.97.242L12.11 14H3.89l-.405 1.621a.5.5 0 0 1-.97-.242L3.36 12H.5a.5.5 0 0 1 0-1H1V2.5A1.5 1.5 0 0 1 2.5 1h4.691l.362-.724A.5.5 0 0 1 8 0ZM2 11h12V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5V11Zm9.61 1H4.39l-.25 1h7.72l-.25-1Z"/>
                        </svg></span> Clases</a></p>';
                } else if ($_SESSION['permiso'] == 2) {
                    echo "<p class='mb-3 p-3'>MENU MAESTROS</p>";
                    echo '<p><a href="./maestroAlumnos.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/><path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg></span> Alumnos</a></p>';
                } else {
                    echo "<p class='mb-3 p-3'>MENU ALUMNOS</p>";
                    echo '<p><a href="./alumnoCalificaciones.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg></span> Ver Calificaciones</p>';
                    echo '<p><a href="./alumnoClases.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel" viewBox="0 0 16 16">
                        <path d="M8 0a.5.5 0 0 1 .473.337L9.046 2H14a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1.85l1.323 3.837a.5.5 0 1 1-.946.326L11.092 11H8.5v3a.5.5 0 0 1-1 0v-3H4.908l-1.435 4.163a.5.5 0 1 1-.946-.326L3.85 11H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4.954L7.527.337A.5.5 0 0 1 8 0zM2 3v7h12V3H2z"/>
                        </svg></span> Administra tus Clases</a></p>';
                }
                ?>
            </div>
        </aside>
        <section style="width:100%;">
            <header class="ms-0 ps-0 pt-0 border">
                <nav class="navbar">
                    <div class="container-fluid align-items-center">
                        <div>
                            Home
                        </div>
                        <div class="nav-item dropdown dropstart" data-bs-display="static">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <span>
                                    <?php
                                    echo "<p class='m-0 p-0'>" . $_SESSION['nombre'] . "</p>";
                                    ?>
                                </span>

                            </a>
                            <ul class="dropdown-menu shadow">
                                <li class="d-flex align-items-center container">
                                    <?php
                                    if ($_SESSION['permiso'] == 2) {
                                        echo '
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                            <a class="dropdown-item" href="./maestroPerfil.view.php">Perfil</a>
                                        ';
                                        echo '
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        ';
                                    } else if ($_SESSION['permiso'] == 3) {
                                        echo '
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                            <a class="dropdown-item" href="./alumnoPerfil.view.php">Perfil</a>
                                        ';
                                        echo '
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        ';
                                    }
                                    ?>
                                </li>
                                <li class="text-danger d-flex align-items-center container">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
                                    </svg>
                                    <a class="dropdown-item text-danger" href="../controller/ctrlrLogOut.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <section style="background-color: #f4f6f9; height:90%;" class="m-0">
                <div class="d-flex justify-content-between">
                    <h2 class="ms-2">Dashboard</h2>
                    <p class="me-2 my-auto"><a href="./main.view.php">Home</a> / Dashboard</p>
                </div>
                <div class="card shadow-sm mx-3">
                    <div class="card-body">
                        <p class="my-0">Bienvenido</p>
                        <p class="my-0">Seleciona la accion que quieras realizar en las pestañas del menu de las izquierda</p>
                    </div>
                </div>

            </section>
            <footer>
                <div class=" border d-flex justify-content-between align-items-center m-0 p-0">
                    <p class="my-3 ps-2">Created by <span><a href=" https://github.com/MTristan012">MTristan012</a></span></p>
                    <p class="my-3 pe-2">Anything you want</p>
                </div>
            </footer>
        </section>
    </main>
</body>

</html>