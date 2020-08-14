<?php
session_start();
 
require('enlace.php');
require('../system_codes_php/functions.php');
date_default_timezone_set('America/Mexico_City');
?>



<?PHP
if(!isset($_REQUEST['action'])){ $_REQUEST['action']=''; }
?>


<?PHP if($_REQUEST['action']=='mover'){

$mover=$_REQUEST['mover'];
$valor=$_REQUEST['resultante'];
$directorio=$_REQUEST['dir'];

$ficheros1  = scandir($directorio, 1);
$php0 = array_search("$mover.php", $ficheros1);

echo "<br> Archivo $ficheros1[$php0] copiado";

copy("$directorio/$ficheros1[$php0]","../$valor.php");



$directorio2 = "$directorio/system_pages";

$ficheros2  = scandir($directorio2, 1);

$php = array_search("$mover"."_php.php", $ficheros2);
echo "<br> Archivo $ficheros2[$php] copiado";
copy("$directorio2/$ficheros2[$php]","../system_pages/$valor"."_php.php");


$phpModal = array_search("$mover"."_php_modal.php", $ficheros2);
echo "<br> Archivo $ficheros2[$phpModal] copiado";
copy("$directorio2/$ficheros2[$phpModal]","../system_pages/$valor"."_php_modal.php");


$modal = array_search("$mover"."_modal.php", $ficheros2);
echo "<br> Archivo $ficheros2[$modal] copiado";
copy("$directorio2/$ficheros2[$modal]","../system_pages/$valor"."_modal.php");

$contenido = array_search("$mover"."_contenido.php", $ficheros2);
echo "<br> Archivo $ficheros2[$contenido] copiado";
copy("$directorio2/$ficheros2[$contenido]","../system_pages/$valor"."_contenido.php");






}
?>

