<?php
include('conexion.php');

//var_dump($_POST);

$message_alert = '';
if (isset($_POST['save'])){
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']); 
    $usuario= trim($_POST['usuario']);     
    $email = $_POST['email'];   
    $password = $_POST['contraseña'];   
    $repassword = $_POST['confirmarcontraseña'];
    $perfil = $_POST['perfil'];
    
    $validar = "SELECT COUNT(*) FROM usuario WHERE email = :email";
	$sentencia1 = $conexion->prepare($validar);
	$sentencia1->execute(array(":email" => $email));

    if(empty($email)){
        header('Location: registro.php?message_alert=1');
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: registro.php?message_alert=2');
    } else if(empty($usuario)){
        header('Location: registro.php?message_alert=3');
    } else if(empty($password)){
        header('Location: registro.php?message_alert=4');
    } else if($password !== $repassword){
        header('Location: registro.php?message_alert=5');
    } else {
        if ($sentencia1->fetchColumn() > 0){
            header('Location: registro.php?message_alert=6');
        } else {
            $passwordEnctrypt = md5($password);
            $registrar = "INSERT INTO `usuario`(`nombre`, `apellidos`,`usuario`, `email`, `contraseña`,`id_perfil`) VALUES (:nombre,:apellido,:usuario,:email,:contrasena,:perfil)";
            $save = $conexion->prepare($registrar);
            $save->execute(array(':nombre'=>$nombre,
                                ':apellido'=>$apellido,
                                ':usuario'=>$usuario,
                                ':email'=>$email,
                                ':contrasena'=>$passwordEnctrypt,
                                ':perfil'=>$perfil));

            if ($save->rowCount() == 1){
                    $message_alert = 'Datos agregados correctamente.';
                    $class = 'success';
                    echo $message_alert;
                    header('Location: panelUsuario.php');
            } else {
                header('Location: registro.php?message_alert=0');
            }
        }
    }
}








/*function validarUsuario($usuario,$conn){

    $usuario = trim($usuario);

    if($usuario === ""){

        echo "el usuario no puede ser vacio";
        return false;
    }
    $sql = "SELECT * FROM `usuario` WHERE `usuario`=:usuario";

    $consulta = $conn->prepare($sql);

    $consulta->execute(array(":usuario"=>$usuario));
    $cuenta = $consulta->rowCont(); 
    if($cuenta==1){

        echo "El usuario ya existe";
        return false;

    }

    return true;
}

if(!validarUsuario($usuario,$conn)){
    echo json_encode('nombre del usuario invalido');
    exit;
}*/




/*$fecha = date_create();
print_r($fecha);
$zonahoraria = new DateTimeZone('-0300');
$fecha->setTime($zonahoraria);*/





?>