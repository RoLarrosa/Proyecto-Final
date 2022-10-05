<?php
include('conexion.php');

if (isset($_POST['login'])){
    $usuario= trim($_POST['usuario']);     
    $email = $_POST['email'];   
    $password = $_POST['contraseña']; 
    $passwordEnctrypt = md5($password);
    $minimocaracteres = 4; 

    if($usuario == "" || !preg_match("/^[a-zA-Z0-9\-_]+$/", $usuario)){
        //"El nombre de usuario solo puede contener letras, numeros, guion o underscore";
        header('Location: login.php?error=1');
    } else if (strlen($usuario) < $minimocaracteres){
        //Comprobar que el nombre de usuario tenga un mínimo de 4 caracteres
        //" Minimo cuatro caracteres";
        header('Location: login.php?error=2');
    } else {
        $validar1 = "SELECT * FROM usuario WHERE usuario = :usuario  AND email = :email AND contraseña = :contrasena";
        $sentencia1 = $conexion->prepare($validar1);
        $sentencia1->execute(array(
            ":usuario" => $usuario,
            ":email" => $email,
            ":contrasena" => $passwordEnctrypt
        ));
        $data = $sentencia1->fetch(PDO::FETCH_OBJ);

        if ($sentencia1->rowCount() == 1){
            $_SESSION['logged'] = 1;

            // Definir variables session (menos la contraseña)
            $_SESSION['usuario_id'] = $data->id_usuario;
            $_SESSION['usuario_nombre'] = $data->nombre;

            

            header('Location: panelUsuario.php');
        } else {
            // No se encontraron coincidencias
            header('Location: login.php?error=3');
        }
    }
}

/*---------------------------------------------------*/
