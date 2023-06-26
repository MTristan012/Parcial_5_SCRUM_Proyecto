<?php
session_start();
if (empty($_SESSION["id"])) {
    header("Location:./logIn.view.php");
} else if ($_SESSION['permiso'] == 3) {
    header("Location:./main.view.php");
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
            <a href="./main.view.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none" style="color:#bec3cc">
                <img src="https://proyectofinaln4.000webhostapp.com/assets/img/logoClose.jpg" alt="logo" class="rounded-circle" width="35rem">
                <span class="fs-5 ms-2">Universidad</span>
            </a>
            <hr class="text-secondary">
            <div style="color:#bec3cc;">
                <?php
                echo "<p class='m-0 p-0' style='font-size:1.2rem;'>Maestro</p>";
                echo "<p class='m-0 p-0'>" . $_SESSION['nombre'] . "</p>";
                ?>
            </div>
            <hr class="text-secondary">
            <div style="color:#bec3cc;">
                <?php
                echo "<p class='mb-3 p-3'>MENU MAESTROS</p>";
                echo '<p><a href="./maestroAlumnos.view.php" type="button" class="btn btn-outline-dark border-0" style="color:#bec3cc;"><span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/><path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                        </svg></span> Alumnos</a></p>';
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
                    <h2 class="ms-2">
                        Editar datos de perfil
                    </h2>
                    <p class="me-2 my-auto">
                        <a href="./main.view.php">Home</a> / Perfil
                    </p>
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