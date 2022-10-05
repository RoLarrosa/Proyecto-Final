<?php
include('template/cabecera.php');


$message_alert = '';

if(isset($_GET['message_alert'])){
    $class = 'warning';

    switch ($_GET['message_alert']) {
        case '1':
            $message_alert = '<strong>Error:</strong> Ingrese un email';
            break;
        case '2':
            $message_alert = '<strong>Error:</strong> Dirección de email no es válida';
            break;
        case '3':
            $message_alert = '<strong>Error:</strong> El Usuario ya existe';
            break;
        case '4':
            $message_alert = '<strong>Error:</strong> Ingrese una contraseña';
            break;
        case '5':
            $message_alert = '<strong>Error:</strong> Las contraseñas no coinciden';
            break;
        case '6':
            $message_alert = 'El email ya se encuentra registrado';
            break;
        default:
            $message_alert = '<strong>Error:</strong> Algo salió mal.';
            $class = 'danger';

            break;
    }
}
?>

<section class="section section-lg bg-default">
    <div class="container">
        <div class="row row-50 justify-content-xl-between flex-lg-row-reverse">
        <div class="col-lg-4 col-xl-3">
            <div class="row row-30 row-xl-60">
            <div class="col-sm-4 col-lg-12">
                <h4>Address</h4>
                <p class="offset-top-1"><a class="link-default" href="#">8734 S. Ashland Ave, <br class="d-none d-md-block">San Diego, CA 60608-2013, US</a></p>
            </div>
            <div class="col-sm-4 col-lg-12">
                <h4>Phones</h4>
                <ul class="list-0 offset-top-1">
                <li><a class="link-default" href="tel:#">1-800-1234-567</a></li>
                <li><a class="link-default" href="tel:#">1-800-8764-098</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-lg-12">
                <h4>E-mails</h4>
                <ul class="list-0 offset-top-1">
                <li><a class="link-default" href="mailto:#">info@demolink.org</a></li>
                <li><a class="link-default" href="mailto:#">mail@demolink.org</a></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="col-lg-8">
            <h2>Registro</h2>
            <!-- RD Mailform-->
            <form class="rd-form rd-mailform" method="POST" action="setUsuario.php">
                <div class="row row-10 row-horizontal-10">
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-first-name">Nombre</label>
                            <input class="form-input" id="contact-first-name" type="text" name="nombre" data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-last-name">Apellido</label>
                            <input class="form-input" id="contact-last-name" type="text" name="apellido" data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email">E-mail</label>
                            <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-username">Usuario</label>
                            <input class="form-input" id="contact-username" type="text" name="usuario" data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-password">Contraseña</label>
                            <input class="form-input" id="contact-password" type="password" name="contraseña"  data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-re-password">Repetir Contraseña</label>
                            <input class="form-input" id="contact-re-password" type="password" name="confirmarcontraseña"  data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <select class="form-select form-select-sm"  name="perfil" aria-label=".form-select-sm example">
                                <option selected>Seleccione su Rol</option>
                                <option value="1">Usuario</option>
                                <option value="2">Transportista</option>
                                <option value="3">Motomandado</option>
                                <option value="4">Mudanza</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <button class="button button-lg button-primary button-raven" type="submit" name="save">Enviar</button>
                        <?php if ($message_alert !== "") { ?>
                            <div class="alert alert-<?php echo $class ?> alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <?php echo $message_alert ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<?php include('template/pie.php')?>