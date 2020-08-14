<div id="container">
   <div class="hidden-header"></div>

<?php  require('header.php'); ?>


<?php


if($_REQUEST['option']==0){
// si no existe una pagina del menu seleccionada manda a llamar al panel
// include('panel.php');
$_REQUEST['option']=1;

}


// manda a llamar las paginas de cada opcion cuando se selecciona
if ((isset($_REQUEST['mod'])) && ($_REQUEST['option']>=1)){

  $_REQUEST['mod']=1;
  $_REQUEST['option']=1;

  require("system_pages/$_REQUEST[mod]_$_REQUEST[option]_modal.php");

include_once("system_pages/$_REQUEST[mod]_$_REQUEST[option]_contenido.php");


include_once("$_REQUEST[mod]_$_REQUEST[option].php");
}

?>







 <?php require('footer.php'); ?>
</div>
<!-- /de idCOnteiner -->
