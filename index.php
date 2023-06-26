<?php
  session_start();
  if (isset($_SESSION['id'])){
    header('Location:./views/main.view.php');
  } else {
    header('Location:./views/logIn.view.php');
  }
?>