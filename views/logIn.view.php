<?php
if (empty($_SESSION["id"])) {
} else {
  header("Location:../sources/main.php");
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
  <link rel="stylesheet" href="./css/login.css">
  <title> FUNVAL INTERNACIONAL </title>
</head>


<body style="background-image: url('/imagen/blue-texture.jpg');">
  <div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">

      <div style="max-width: 22em;">

        <form class="card bg-white p-4 shadow-sm rounded-3" method="post">
          <div class="d-flex justify-content-center my-2">
            <img src="../imagen/Funval Logo.svg" alt="logo" width="70%">
          </div>
          <p class="text-center px-3 pb-3">Bienvenido Ingresa con tu cuenta</p>
          <?php
          include "../model/conexion.php";
          include "../controller/ctrlrLogIn.php";
          ?>
          <div class="mb-3 input-group">
            <input type="email" class="form-control border-end-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" style="box-shadow: none;" name="loginEmail">
            <span class=" input-group-text bg-white border-start-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#777777" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
              </svg>
            </span>
          </div>
          <div class="mb-3 input-group">
            <input type="password" class="form-control border-end-0" id="exampleInputPassword1" placeholder="Password" style="box-shadow: none;" name="loginPassword">
            <span class="input-group-text bg-white border-start-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#777777" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
              </svg>
            </span>
          </div>
          <div class="d-flex justify-content-center">
            <input class="btn btn-primary fw-semibold px-3" style="width: 100%;" type="submit" name="btnLogIn" value="Acceder" />
          </div>
        </form>

      </div>

    </div>
  </div>
</body>

</html>