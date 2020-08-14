<?php
session_start();
 
// mb_internal_encoding("UTF-8");
require('../system_codes_php/enlace.php');
require('../system_codes_php/functions.php');
date_default_timezone_set('America/Mexico_City');
?>

<?PHP
if(!isset($_REQUEST['action'])){ $_REQUEST['action']=''; }
?>


<!-- modales -->
<?PHP
if($_REQUEST['action']=='modalFormArticulos'){ ?>


<!-- contenido de una modal -->
<form form0 result='articulos'  cde='1_1_php'  name='inicio' show-mod=''  hide-modal='articulosModal' class="contact-form" method="post" enctype='multipart/form-data'>



<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Registrando Actividad</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name='action' value="add-actividad">

<input type="hidden" name="tipo" value="imagen">

<div class="form-group">
<label>Grupo:</label>
<select   cde='1_1_php' name="idGrupo" class="form-control " style="width: 100%;" >
<option value="">seleccionar...</option>
<?php
/* --- hallando secciones ---  */
$consultaSECCION ="SELECT grupos.*
FROM grupos
   ";


$resultSECCION= mysqli_query( $GLOBALS["enlace"] , $consultaSECCION);
while($seccion= mysqli_fetch_array($resultSECCION, MYSQLI_ASSOC)){

echo "<option value='$seccion[idGrupo]' >$seccion[grupo]</option>";

}
/* --- fin hallando secciones ---  */

 ?>
</option>


</select>
</div>

<input type="hidden" name="tipo" value="imagen">


<div class="form-group">
<label>Titulo:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-header"></i>
</div>
<input type="text" class="form-control" name="titulo">
</div>
<!-- /.input group -->
</div>


<div class='form-group '>
<label>Fecha:</label>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-calendar'></i>
</div>
<!--
d-m-Y h:i K
data-date-format='d-m-Y'
data-max-date='20-04-2017'
data-min-date='18-04-2017'
data-min-date='today'
data-mode='range'
data-inline= 'true'
para mostrar la hora
data-enable-time='false'
para mostrarlo siempre en pantalla
  -->
<input  class='form-control fechas' type='text' name="fecha"
data-date-format='d-m-Y' value="<?PHP echo DATE("d/m/Y"); ?>">


</div>
<!-- /.input group -->
</div>

<div class="form-group">
<label>Imagenes:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="file" class="form-control" name="imagenes[]" multiple="true">
</div>
<!-- /.input group -->
</div>



<div class="form-group ">
<label>Descripcion:</label>
<textarea class="form-control" name="descripcion" ></textarea>
</div>




      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

<button type="submit" id="submit" class="btn-system btn">
Guardar
</button>

</div>

      </form>
<?PHP
}
?>


<!-- edicion -->



<?PHP
if($_REQUEST['action']=='modalFormeditARTICULOS'){ ?>



<?php


$consultaempresas ="SELECT
actividades.*

FROM actividades
WHERE
actividades.idActividad='$_REQUEST[valor]' ";

$resultempresas= mysqli_query( $GLOBALS["enlace"] , $consultaempresas);
$actividad= mysqli_fetch_array($resultempresas, MYSQLI_ASSOC); 

$fecha= date_format(date_create($actividad['fecha']), 'd-m-Y');

?>


<!-- contenido de una modal -->
<form form0 result="art<?php echo $actividad['idActividad']; ?>" cde='1_1_php'  name='EDICIONdeA<rticulos' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>



<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Editando Actividad</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name='action' value="edit-actividad">
<input type="hidden" name='idActividad' value="<?php echo $actividad['idActividad']; ?>">






<div class="form-group" respuesta='grupos3'>
<label>Grupo:</label>
<select
name="idGrupo" class="form-control " style="width: 100%;" >

<?php
/* --- hallando secciones ---  */
$consultaSECCION ="SELECT grupos.*
FROM grupos

   ";


$resultSECCION= mysqli_query( $GLOBALS["enlace"] , $consultaSECCION);
while($seccion= mysqli_fetch_array($resultSECCION, MYSQLI_ASSOC)){


echo "<option value='$seccion[idGrupo]' ".($actividad['idGrupo']==$seccion['idGrupo'] ?'selected':'').">$seccion[grupo]</option>";


}
/* --- fin hallando secciones ---  */

 ?>

</select>
</div>

<div class="form-group">
<label>Titulo:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-header"></i>
</div>
<input type="text" class="form-control" name="titulo" <?php echo "value='$actividad[titulo]'"; ?>>
</div>
<!-- /.input group -->
</div>



<div class='form-group '>
<label>Fecha:</label>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-calendar'></i>
</div>
<!--
d-m-Y h:i K
data-date-format='d-m-Y'
data-max-date='20-04-2017'
data-min-date='18-04-2017'
data-min-date='today'
data-mode='range'
data-inline= 'true'
para mostrar la hora
data-enable-time='false'
para mostrarlo siempre en pantalla
  -->

  <?PHP 
  
$fecha= date_format(date_create($actividad['fecha']), 'd/m/Y');
  ?>
<input  class='form-control fechas' type='text' name="fecha"
data-date-format='d-m-Y' value="<?PHP echo $fecha; ?>">


</div>
<!-- /.input group -->
</div>







<div class="form-group ">
<label>Descripcion:</label>
<textarea class="form-control" name="descripcion" ><?php echo textr($actividad['descripcion']); ?></textarea>
</div>



<div class="row">
 <div class="form-group col-sm-12">
   <div class="alert alert-danger">
   <label class="">Acción a realizar</label>
   <select name='dell' class="form-control" required="true">
   <option value="guardar">Guardar Cambios</option>
   <option value="eliminar">Eliminar</option>
   </select></div>
 </div>
 </div>

      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>


<button type="submit"  class="btn-system btn">
aceptar
</button>

</div>

      </form>
<?PHP
}
?>




<?PHP
if($_REQUEST['action']=='modalAgregarIMG'){
 ?>


<!-- contenido de una modal -->
<form form0 result='art<?php echo $_REQUEST['valor']; ?>'  cde='1_1_php'  name='formaddArchivo<?php echo $_REQUEST['valor']; ?>' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Agregar imagenes</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="add-Archivo">
<input type="hidden" name="tipo" value="imagen">
<input type="hidden" name="idActividad" value="<?php echo $_REQUEST['valor']; ?>" >


<div class="form-group">
<label>Agregar imagen:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="file" class="form-control" name="imagenes[]" multiple="true">
</div>
<!-- /.input group -->
</div>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button type="submit" id="submit" class="btn-system btn">
Subir
</button>



      </div>

      </form>
<?PHP
}
?>



<?PHP
if($_REQUEST['action']=='modalAgregarVideo'){
 ?>


<!-- contenido de una modal -->
<form form0 result='art<?php echo $_REQUEST['valor']; ?>'  cde='1_1_php'  name='formaddArchivoVideo<?php echo $_REQUEST['valor']; ?>' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Video</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="add-video">
<input type="hidden" name="tipo" value="video">
<input type="hidden" name="idActividad" value="<?php echo $_REQUEST['valor']; ?>" >


<div class="form-group">
<label>Ingresa el URL:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-youtube"></i>
</div>
<input type="text" class="form-control" name="extencion" >
</div>
<!-- /.input group -->
</div>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button type="submit" id="submit" class="btn-system btn">
Subir
</button>



      </div>

      </form>
<?PHP
}
?>


<!-- imagenes -->
<?PHP
if($_REQUEST['action']=='modalSolicitudIMG'){
 ?>

<?php
$consultaimagen ="SELECT
archivos_actividades.idArchivo,archivos_actividades.idActividad
FROM archivos_actividades

WHERE
archivos_actividades.idArchivo='$_REQUEST[valor]'
";
$resultimagen= mysqli_query( $GLOBALS["enlace"] , $consultaimagen);
$imagen= mysqli_fetch_array($resultimagen, MYSQLI_ASSOC);
?>

<!-- contenido de una modal -->
<form form0 result='art<?php echo $imagen['idActividad']; ?>'  cde='1_1_php'  name='formEditArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Imagen</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="edit-Archivo">
<input type="hidden" name="idArchivo" value="<?php echo $imagen['idArchivo']; ?>" >
<input type="hidden" name="idActividad" value="<?php echo $imagen['idActividad']; ?>" >


<?PHP 
if($_SESSION['idControl']==1){
?>

<div class="form-group">
<label>Sustituir imagen:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="file" class="form-control" name="img" >
</div>
<!-- /.input group -->
</div>


<?PHP
}
?>




<img src="<?php echo "system_archivos_media/$imagen[idArchivo].jpg?1".rand(0, 20); ?>" alt="..." class="img-thumbnail" onerror="this.onerror=null;this.src=''";>




<?PHP 
if($_SESSION['idControl']==1){
?>
<div class="row">
<br>
 <div class="form-group col-sm-12">
   <div class="alert alert-danger">
   <label class="">Acción a realizar</label>
   <select name='dell-archivo' class="form-control" required="true">
   <option value="guardar">Guardar Cambios</option>
   <option value="eliminar">Eliminar</option>
   </select></div>
 </div>
 </div>
 <?PHP 
}
?>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      
        <?PHP 
if($_SESSION['idControl']==1){
?>
       <button type="submit" id="submit" class="btn-system btn">
aceptar
</button>
<?PHP 
}
?>



      </div>

      </form>
<?PHP
}
?>


<!-- imagenes -->
<?PHP
if($_REQUEST['action']=='modalSolicitudVID'){
 ?>

<?php
$consultaimagen ="SELECT
archivos_actividades.idArchivo,archivos_actividades.idActividad, archivos.extencion
FROM archivos_actividades

LEFT JOIN archivos
ON archivos_actividades.idArchivo=archivos.idArchivo


WHERE
archivos_actividades.idArchivo='$_REQUEST[valor]'


";
$resultimagen= mysqli_query( $GLOBALS["enlace"] , $consultaimagen);
$imagen= mysqli_fetch_array($resultimagen, MYSQLI_ASSOC);
?>

<!-- contenido de una modal -->
<form form0 result='art<?php echo $imagen['idActividad']; ?>'  cde='1_1_php'  name='formEditArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Imagen</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="edit-video">
<input type="hidden" name="idArchivo" value="<?php echo $imagen['idArchivo']; ?>" >
<input type="hidden" name="tipo" value="video">
<input type="hidden" name="idActividad" value="<?php echo $imagen['idActividad']; ?>" >


<div class="form-group">
<label>actualizar el URL:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-youtube"></i>
</div>
<input type="text" class="form-control" name="extencion" value="https://www.youtube.com/watch?v=<?php echo $imagen['extencion']; ?>">
</div>
<!-- /.input group -->
</div>



<iframe  class="embed-responsive-item" id="ytplayer" type="text/html" width="720" height="405"
src="//www.youtube.com/embed/<?php echo $imagen["extencion"];  ?>"
frameborder="0" allowfullscreen>


</iframe>




<div class="row">
<br>
 <div class="form-group col-sm-12">
   <div class="alert alert-danger">
   <label class="">Acción a realizar</label>
   <select name='dell-archivo' class="form-control" required="true">
   <option value="guardar">Guardar Cambios</option>
   <option value="eliminar">Eliminar</option>
   </select></div>
 </div>
 </div>

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button type="submit" id="submit" class="btn-system btn">
aceptar
</button>



      </div>

      </form>
<?PHP
}
?>