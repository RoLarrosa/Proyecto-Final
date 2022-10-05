<?php
include('template/cabecera.php');

$message_alert = "";

if(isset($_GET['error'])){
    $class = "warning";

    switch ($_GET['error']) {
        case '1':
            $message_alert = "El nombre de usuario solo puede contener letras, numeros, guiones";
            break;
        case '2':
            $message_alert = "Nombre de usuario no válido";
            break;
        default:
            $message_alert = "Usuario y/o contraseña incorrectos";
            $class = "danger";
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
            <h2>Inicio de Sesion</h2>
            <!-- RD Mailform-->
            <form class="rd-form rd-mailform" method="POST" action="loginUsuario.php">
                <div class="row row-10 row-horizontal-10">
                    <div class="col-md-6">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-username">Usuario</label>
                            <input class="form-input" id="contact-username" type="text" name="usuario" data-constraints="@Required">
                        </div>
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email">E-mail</label>
                            <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                        </div>
                        <div class="form-wrap">
                            <label class="form-label" for="contact-password">Contraseña</label>
                            <input class="form-input" id="contact-password" type="password" name="contraseña"  data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="button button-lg button-primary button-raven" type="submit" name="login">Enviar</button>
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