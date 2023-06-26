<?php
session_start();
if (!empty($_POST['btnLogIn'])){
    if (!empty($_POST['loginEmail']) and !empty($_POST['loginPassword'])){
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];
        $sql=$conn->query(" SELECT * FROM universityusers where email='$email' and password='$password' ");
        if ($data=$sql->fetch_object()) {
            $_SESSION["id"]=$data->id;
            $_SESSION["email"]=$data->email;
            $_SESSION["password"] = $data->password;
            $_SESSION["permiso"]=$data->permiso;
            $_SESSION["estado"] = $data->estado;
            $_SESSION["nombre"] = $data->nombre;
            $_SESSION["direccion"] = $data->direccion;
            $_SESSION["fechaDeNacimiento"] = $data->fechaDeNacimineto;
            $_SESSION["claseAsignada"] = $data->claseAsignada;
            $_SESSION["dni"] = $data->dni;
            $_SESSION["astronomia"] = $data->astronomia;
            $_SESSION["biologia"] = $data->biologia;
            $_SESSION["biomedicina"] = $data->biomedicina;
            $_SESSION["cienciasDeMateriales"] = $data->cienciasDeMateriales;
            $_SESSION["cienciasAmbientales"] = $data->cienciasAmbientales;
            $_SESSION["cienciasBasicas"] = $data->cienciasBasicas;
            $_SESSION["cienciasDeLaTierra"] = $data->cienciasDeLaTierra;
            header("Location:../views/main.view.php");
        } else {
            echo "<div class='alert alert-danger text-center mb-3'>Usuario no Encontrado</div>";
        }
        
    } else{
        echo "<div class='alert alert-danger text-center mb-3'>Llene el Formulario</div>";
    }
}
?>