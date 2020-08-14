<div class="section">
      <div class="container">

        <!-- Start Services Icons -->
        <div class="row">

<?php if (!isset($_REQUEST['mod'])) {?>
<div class="col-xs-12">

<div class="col-sm-4 col-sm-offset-4">
<h1 class="classic-title text-center">
<span>
Panel
</span>
</h1>
</div>

</div>


<?php }?>

</div>
      <!-- Divider -->
<div class="hr" style="margin-top:25px; margin-bottom:30px;"></div>

<div class="row">
<?php
function modulos($mod) {

/*si se muestran todos los modulos los pone en 4 columnas
y si solo se muesra uno lo centra*/

    if ($mod == 'all') {
        $col  = 'col-sm-6';
        $icon = 'icon-large-effect icon-effect-2';
        $h    = 'h4';
    } else {
        $col  = 'col-sm-8 col-sm-offset-2 ';
        $icon = 'icon-large-effect icon-effect-1';
        $h    = 'h2';
    }

    if (
        ($mod == 'all' || $mod == '5')
        && (($_SESSION['permisos_tkm'] == 'administrador') || ($_SESSION['permisos_tkm'] == 'alimentador') || ($_SESSION['permisos_tkm'] == 'cliente'))
    ) {
        ?>
           <!-- Start Service Icon 1 -->
          <div class="<?php echo $col; ?> service-box service-center">
          <a style="
    color: black;
" href='?mod=5' class="clearfix">
          <div class="service-boxed">
          <div class="service-icon" style="margin-top:-25px;">
          <i class="fa fa fa-coffee <?php echo $icon; ?>">
          </i>
          </div>
           <div class="service-content">
          <div class="<?php echo "$h"; ?>">
      Administrador Web
          </div>
          <p>
          <?php if ($mod != 'all') {

            echo "Bienvenido $_SESSION[nombre]";

            ?>
<br>
Este es el módulo de administración web, en donde podrás cargar toda clase de contenido el cual será vinculado a tu sitio web.
Si tienes alguna duda no dudes en comunicarte con nosotros.
<br>
Soporte técnico las 24 horas: 771 349 3475
<br>
Informes: ceo@interdualmexico.com
<br>
<a target="_blank" href="http://www.interdualmexico.com">www.interdualmexico.com</a>

<?PHP }?>
          </p>
          </div>
          </div>
          </a>
          </div>
          <!-- End Service Icon 1 -->
<?php }


 if (
        ($mod == 'all' || $mod == '10')
        && (($_SESSION['permisos_tkm'] == 'dfd') || ($_SESSION['permisos_tkm'] == 'alimentador') || ($_SESSION['permisos_tkm'] == 'cliente'))
    ) {
        ?>
           <!-- Start Service Icon 1 -->
          <div class="<?php echo $col; ?> service-box service-center">
          <a style="
    color: black;
" href='?mod=10' class="clearfix">
          <div class="service-boxed">
          <div class="service-icon" style="margin-top:-25px;">
          <i class="fa fa-magnet <?php echo $icon; ?>">
          </i>
          </div>
           <div class="service-content">
          <div class="<?php echo "$h"; ?>">
Inbound Marketing
          </div>
          <p>
          <?php if ($mod != 'all') {

            echo "Bienvenido $_SESSION[nombre]";

            ?>
<br>
Este es el módulo Inbound Marketing, en donde podrás darle seguimiento a los visitantes registrados desde tu sitio web, podrás ver y  actualizar su información de contacto, ver su actividad dentro del tu web lo cual te ayudará a darle un seguimiento vía telemarketing ofreciendo lo que ya sabes que le interesa. 
<br>
Soporte técnico las 24 horas: 771 349 3475
<br>
Informes: ceo@interdualmexico.com
<br>
<a target="_blank" href="http://www.interdualmexico.com">www.interdualmexico.com</a>

<?PHP }?>
          </p>
          </div>
          </div>
          </a>
          </div>
          <!-- End Service Icon 1 -->
<?php }?>



<?php }?>
<!-- fin de funcion  -->



<?php

/*identifica los modulos a mostrar*/
if (!isset($_REQUEST['mod'])) {
    $mod = 'all';
} else {
    $mod = $_REQUEST['mod'];
}

modulos($mod);

?>


        </div>
        <!-- End Services Icons -->

        <!-- Divider -->
        <div class="hr1 margin-top"></div>


        <!-- Start Recent Projects Carousel -->

        <!-- End Recent Projects Carousel -->





      </div>
    </div>