<?php 

include('template/cabecera.php');
include('conexion.php');

$validar = "SELECT u.usuario, p.perfil, pu.publicacion FROM usuario u JOIN perfil p ON u.id_perfil = p.id_perfil JOIN publicaciones pu ON p.id_perfil = pu.id_perfil AND u.id_usuario = pu.id_usuario WHERE u.id_perfil = 4";
$sentencia1 = $conexion->prepare($validar);
$sentencia1->execute();
$listaPublicaciones = $sentencia1-> fetchAll(PDO::FETCH_ASSOC);


?>

<section class="container">
    <div class="row">
    <?php foreach($listaPublicaciones as $publicaciones){ ?>
        <div class="row cards" style="width: auto; margin: auto auto;"">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="max-width:319px;">
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $publicaciones['usuario'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $publicaciones['perfil']?></h6>
                            <p class="card-text"><?php echo $publicaciones['publicacion']?></p>
                            <a href="#" class="card-link">Seleccionar</a>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div> 
    <?php } ?>
    </div>
</section>
<br>




<?php include('template/pie.php')?>