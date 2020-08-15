<?php
session_start();
 
// mb_internal_encoding("UTF-8");

include_once('../system_codes_php/enlace.php');
date_default_timezone_set('America/Mexico_City');
?>


<?php



function articulosList($idGrupo,$idActividad, $fecha, $idControl){


// recuperando fecha

$consultaArticulos="SELECT
actividades.*, grupos.grupo, DATE_FORMAT(actividades.fecha, '%d/%m/%Y') AS fechaf

FROM actividades

LEFT JOIN grupos
ON actividades.idGrupo=grupos.idGrupo

WHERE "; 

if($fecha=="mes"){

  
 /*primer dia del mes*/
  $month = date('m');
  $year = date('Y');
  $primer= date('Y-m-d', mktime(0,0,0, $month, 1, $year));
 
 /*Ultimo dia del mes*/
 $month = date('m');
  $year = date('Y');
  $day = date("d", mktime(0,0,0, $month+1, 0, $year));
  $ultimo= date('Y-m-d', mktime(0,0,0, $month, $day, $year));

  $consultaArticulos.=" 
  actividades.fecha BETWEEN '$primer' AND '$ultimo' AND
  ";

}

if($fecha=="espesificar"){

  $fecha2= date_format(date_create($_REQUEST['fecha2']), 'Y-m-d');


  $consultaArticulos.=" 
  actividades.fecha = '$fecha2' AND
  ";

}

 $consultaArticulos.="actividades.idActividad like '$idActividad'

AND  ( actividades.idGrupo LIKE '$idGrupo')

ORDER BY actividades.fecha DESC

";


$consultaArticulos.=($idActividad=="%")? "" : "LIMIT 1";


$resultArticulos= mysqli_query( $GLOBALS["enlace"] , $consultaArticulos);
while($articulo= mysqli_fetch_array($resultArticulos, MYSQLI_ASSOC)){

if($idActividad=='%'){


ECHO <<<EOT
<div class="col-sm-4 col-md-offset-4" respuesta="art$articulo[idActividad]">
EOT;
}else{
ECHO <<<EOT
<div >
EOT;
}


?>






 <!-- Start Post -->
            <div class="blog-post gallery-post" style="
    background: #fcfcfc;
    border: solid 11px #1C914D;
    padding: 11px 3px;
    border-left: solid 1px #1C914D;
    border-right: solid 1px #1C914D;
    border-radius: 3px;
">

<!-- Post Gallery -->
<div class="post-head" style="height: 210px;">
<div class="post-slider touch-slider">

<?php
$consultaArchivos="SELECT
CONCAT('system_archivos_media/',archivos_actividades.idArchivo,'.jpg') as imagen
FROM archivos_actividades


LEFT JOIN archivos
ON archivos_actividades.idArchivo=archivos.idArchivo



WHERE
archivos_actividades.idActividad='$articulo[idActividad]'
AND archivos.tipo='imagen'
";





$resultArchivos= mysqli_query( $GLOBALS["enlace"] , $consultaArchivos);
while($archivo= mysqli_fetch_array($resultArchivos, MYSQLI_ASSOC)){ 
  
  $img = "$archivo[imagen]";
  
  ?>

<div class="item">
<a class="lightbox"  href="<?php echo $img; ?>" data-lightbox-gallery="gallery1">
<div class="thumb-overlay"><i class="fa fa-picture-o"></i></div>
<img alt="" src="<?php echo $img; ?>">
</a>
</div>

<?php } ?>

</div>
</div>



              <!-- Post Content -->

              <div class="post-content">
                <div class="post-type"><i class=" fa fa-picture-o"></i></div>
                <h3><a href="#"><?php echo $articulo['fechaf']." ".$articulo['titulo']; ?></a></h3>
                <ul class="post-meta">
                <!--   <li>By <a href="#">iThemesLab</a></li> -->

                  <li><?php echo "|$articulo[grupo]"; ?></li>
                
                </ul>
              </div>

<ul class="icons-list" style="
    border-radius: 1px;
    border: solid 4px #1C914D;
    padding: 3px 3px;
    border-left: solid 1px #1C914D;
    border-right: solid 1px #1C914D;
    background: #1C914D;
    color: white;
    ">

<?PHP 
if($idControl==1){
  ?>

<li>

<span link="mod1" mdl="modalSolicitud" action="modalFormeditARTICULOS" cde="1_1_php_modal"
value="<?php echo $articulo['idActividad'] ?>" class="gray-l">
<i class="fa fa-edit"></i>
Editar Información
</span></li>
<?PHP 
}
  ?>


<li>
<strong>Imagenes:
<?PHP echo $idControl; ?>
</strong>
<br>

<?PHP 
if($idControl==1){
  ?>

<span link="mod1" mdl="modalSolicitud" action="modalAgregarIMG"
cde="1_1_php_modal"
 value="<?php echo $articulo['idActividad'] ?>" class="gray-l">
<i class="fa fa-plus"></i>
Agregar imagen
</span>

<?PHP 
}
  ?>

<?php
$consultaimagen ="
SELECT
archivos_actividades.idArchivo, archivos.*
FROM archivos_actividades

LEFT JOIN archivos
ON archivos_actividades.idArchivo=archivos.idArchivo



WHERE
archivos_actividades.idActividad='$articulo[idActividad]'
AND archivos.tipo='imagen'

";

$resultimagen= mysqli_query( $GLOBALS["enlace"] , $consultaimagen);
$conteo=1;
while($imagen= mysqli_fetch_array($resultimagen, MYSQLI_ASSOC)){ ?>



<div link="mod1" mdl="modalSolicitud" action="modalSolicitudIMG" cde="1_1_php_modal"
value="<?php echo $imagen['idArchivo']; ?>" class="gray-l">
<i class="fa fa-picture-o"></i>
<?PHP echo "Imagen $conteo" ?>
</div>

<?php 
$conteo++;
} ?>



</li>



</ul>
              <p>
              <?php
              echo $articulo['descripcion']; ?>
              </p>



            </div>
            <!-- End Post -->


</div>



<?PHP }




}

?>