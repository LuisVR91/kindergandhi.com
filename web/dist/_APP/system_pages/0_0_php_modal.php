<?php
session_start();
 
require('../system_codes_php/enlace.php');
require('../system_codes_php/functions.php');
date_default_timezone_set('America/Mexico_City');
?>

<?PHP
if(!isset($_REQUEST['action'])){ $_REQUEST['action']=''; }
?>


<!-- modales -->
<?PHP
if($_REQUEST['action']=='modalSolicitudEDICION'){ ?>

<?php $consultaUsuarios ="SELECT
usuarios.*,
DATE_FORMAT(usuarios.fnacimiento, '%d/%m/%Y') AS fnacimiento,


personal.*,
puestos.*

FROM usuarios

INNER JOIN personal
ON usuarios.idUsuario=personal.idUsuario

INNER JOIN puestos
ON personal.idPuesto=puestos.idPuesto




WHERE usuarios.idUsuario='$_REQUEST[valor]' ";


$resultUsuarios= mysqli_query( $GLOBALS["enlace"] , $consultaUsuarios);
$personal= mysqli_fetch_array($resultUsuarios, MYSQLI_ASSOC); ?>

<!-- contenido de una modal -->
<form form0 result='<?php echo 'p'.$_REQUEST['valor2']; ?>'  cde='0_0_php'  name='edicion' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data'>



<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Información Principal</h4>
      </div>
<input type="hidden" name="action" value="edit-personal">
<input type="hidden" name="idPersonal" value="<?php echo $personal['idPersonal']; ?>">
<input type="hidden" name="idUsuario" value="<?php echo $personal['idUsuario']; ?>">


      <div class="modal-body">

<div class="row">



<div class="col-sm-6">




<div class="row">
  <div class="form-group col-sm-12">
<label>Puesto</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-briefcase"></i>
</div>
<select name='idPuesto' class="form-control" required="true">
<option value="">Seleccionar...</option>
<?php
$consultapuestos= "SELECT
puestos.puesto, puestos.idPuesto
FROM puestos
";

$resultpuestos = mysqli_query( $GLOBALS["enlace"] , $consultapuestos);
while($puestos= mysqli_fetch_array($resultpuestos, MYSQLI_ASSOC)){
echo "<option value='$puestos[idPuesto]'>$puestos[puesto]</option>";

echo "<option value='$puestos[idPuesto]' ".($personal['idPuesto']==$puestos['idPuesto'] ?'selected':'').">$puestos[puesto]</option>";


}
?>
</select>
</div>
</div>





</div>


<div class="row">
<div class="form-group col-sm-6 ">
<label>Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="nombre(s)"
value="<?php echo "$personal[nombre]"; ?>" >
</div>
<div class="form-group col-sm-6 ">
<label>&nbsp;</label>
<input type="text" class="form-control" name="apellido" placeholder="Apellidos"
value="<?php echo "$personal[apellido]"; ?>" >
</div>
</div>


<div class="form-group ">
<label>Teléfono</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" name='telefono' class="form-control"
 value="<?php echo "$personal[telefono]"; ?>" >
</div>
<!-- /.input group -->
</div>


  <div class="form-group ">
<label>Correo</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-envelope"></i>
</div>
<input type="text" name='correo'   class="form-control"
value="<?php echo "$personal[email]"; ?>"
>
</div>
<!-- /.input group -->
</div>



<div class="form-group">
<label>Fecha de nacimiento</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name='fnacimiento'   class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo "$personal[fnacimiento]"; ?>">
</div>
<!-- /.input group -->
</div>

<div class="row">


<div class="form-group col-sm-12">
<label>Número de Seguro Social</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" name='seguro' class="form-control"
value="<?php echo "$personal[seguro]"; ?>" >
</div>
<!-- /.input group -->
</div>

</div>


<div class="form-group ">
<label>Comentarios</label>
<textarea class="form-control" name="comentarios" ><?php echo textr("$personal[comentarios]"); ?></textarea>

<!-- /.input group -->
</div>





</div>
<!-- fin de col-6 #1 -->


<div class="col-sm-6">
<div class="row">

<div class="form-group col-sm-12">
<label>Dirección</label>
</div>

<div class="form-group col-sm-12">
<label><small>Calle</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='calle'  class="form-control" value="<?php echo "$personal[calle]"; ?>">
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-12">
<label><small>Colonia</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='colonia'  class="form-control"
value="<?php echo "$personal[colonia]"; ?>" >
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-6">
<label><small>Número Exterior</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa">#</i>
</div>
<input type="text" name='nExterior'  class="form-control"
value="<?php echo "$personal[nExterior]"; ?>" >
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Número Interior</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa">#</i>
</div>
<input type="text" name='nInterior'  class="form-control"
value="<?php echo "$personal[nInterior]"; ?>" >
</div>
<!-- /.input group -->
</div>




<div class="form-group col-sm-6">
<label><small>Localidad</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='localidad'  class="form-control"
value="<?php echo "$personal[localidad]"; ?>" >
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Municipio / Delegación</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag-o"></i>
</div>
<input type="text" name='idMunicipio'    class="form-control"
value="<?php echo "$personal[idMunicipio]"; ?>" >
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Código Postal</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-marker"></i>
</div>
<input type="text" name='cp'    class="form-control"
value="<?php echo "$personal[cp]"; ?>" >
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-6">
<label><small>Estado</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag"></i>
</div>
<input type="text" name='idEstado'  class="form-control"
value="<?php echo "$personal[idEstado]"; ?>"
>
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>País</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag"></i>
</div>
<input type="text" name='pais'  class="form-control"
value="<?php echo "$personal[pais]"; ?>" >
</div>
<!-- /.input group -->
</div>







</div>

</div>
<!-- fin de col-6 #2 -->

<div class="col-sm-12">


  <div  class="col-sm-12"
  style="background: #f1f1f1;border: solid 2px rgba(0, 0, 0, 0.27);border-radius: 11px;padding: 11px 11px;"
  >


  <div class="form-group col-sm-12">
  <label>Referencia</label>
  </div>

  <div class="form-group col-sm-6">
  <label>Parentesco</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-user"></i>
  </div>
  <input type="text" name='parentesco' class="form-control"
  value="<?php echo "$personal[parentesco]"; ?>" >
  </div>
  <!-- /.input group -->
  </div>

  <div class="form-group col-sm-6">
  <label>Teléfono</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-phone"></i>
  </div>
  <input type="text" name='telefonoR' class="form-control"
  value="<?php echo "$personal[telefonoR]"; ?>" >
  </div>
  <!-- /.input group -->
  </div>

  <div class="form-group col-sm-12">
  <label>Nombre</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-user"></i>
  </div>
  <input type="text" name='referencia' class="form-control"
  value="<?php echo "$personal[referencia]"; ?>" >
  </div>
  <!-- /.input group -->
  </div>



  <div class="form-group col-sm-12">
  <label>Dirección</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-map"></i>
  </div>
  <input type="text" name='direccionR' class="form-control"
  value="<?php echo "$personal[direccionR]"; ?>" >
  </div>
  <!-- /.input group -->
  </div>



  </div>


</div>
<!-- fin de col-6 #3 -->


<div class="col-sm-12">
  <div class="row">
<br>
 <div class="form-group col-sm-12">
   <div class="alert alert-danger">
   <label class="">Acción a realizar</label>
   <select name='user-estado' class="form-control" required="true">
   <option value="guardar">Guardar Cambios</option>


<?php
if($usuario['estadoPueUsu']=='activo'){

echo <<<EOT
<option value="baja">Dar de baja</option>
EOT;
}else{
echo <<<EOT
<option value="activo">Dar de Alta</option>
EOT;

}

 ?>

   </select></div>
 </div>
 </div>
</div>


  </div>

      </div>
      <!-- fin de modal body -->






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


<?PHP
if($_REQUEST['action']=='modalFormPersonal'){ ?>


<!-- contenido de una modal -->
<form form0 result='personal'  cde='0_0_php'
name="personal<?php echo rand(); ?>" show-mod=''  hide-modal='personal'
class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Registrando Personal</h4>
      </div>
    <div class="modal-body">
  <div class="row">



<div class="col-sm-6">


<input type="hidden" name="action" value="add-personal">





<div class="form-group ">
<label>Sucursal:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-building"></i>
</div>
<select class="form-control" name="idSucursal"  require='true'>
<option value=''>seleccionar...</option>";

<?php
$consultaempresas ="SELECT
sucursal.sucursal,sucursal.idSucursal
FROM sucursal

INNER JOIN cue_suc
ON cue_suc.idSucursal=sucursal.idSucursal

WHERE

cue_suc.idCuenta='$_SESSION[idCuenta]'

";
echo $consultaempresas ;

$resultempresas= mysqli_query( $GLOBALS["enlace"] , $consultaempresas);
while($sucursal= mysqli_fetch_array($resultempresas, MYSQLI_ASSOC)){

echo "<option value='$sucursal[idSucursal]' >$sucursal[sucursal]
</option>";
}
?>
</select>
</div>
</div>

<div class="row">
  <div class="form-group col-sm-12">
<label>Puesto</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-briefcase"></i>
</div>
<select name='idPuesto' class="form-control" required="true">
<option value="">Seleccionar...</option>
<?php
$consultapuestos= "SELECT
puestos.puesto, puestos.idPuesto
FROM puestos
";

$resultpuestos = mysqli_query( $GLOBALS["enlace"] , $consultapuestos);
while($puestos= mysqli_fetch_array($resultpuestos, MYSQLI_ASSOC)){
echo "<option value='$puestos[idPuesto]'>$puestos[puesto]</option>";
}
?>
</select>
</div>
</div>





</div>


<div class="row">
<div class="form-group col-sm-6 ">
<label>Nombre</label>
<input type="text" class="form-control" name="nombre" placeholder="nombre(s)">
</div>
<div class="form-group col-sm-6 ">
<label>&nbsp;</label>
<input type="text" class="form-control" name="apellido" placeholder="Apellidos">
</div>
</div>


<div class="form-group ">
<label>Teléfono</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" name='telefono' class="form-control">
</div>
<!-- /.input group -->
</div>


  <div class="form-group ">
<label>Correo</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-envelope"></i>
</div>
<input type="text" name='correo'   class="form-control">
</div>
<!-- /.input group -->
</div>



<div class="form-group">
<label>Fecha de nacimiento</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name='fnacimiento'   class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
</div>
<!-- /.input group -->
</div>

<div class="row">


<div class="form-group col-sm-12">
<label>Número de Seguro Social</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" name='seguro' class="form-control">
</div>
<!-- /.input group -->
</div>

</div>


<div class="form-group ">
<label>Comentarios</label>
<textarea class="form-control" name="comentarios" ></textarea>

<!-- /.input group -->
</div>





</div>
<!-- fin de col-6 #1 -->


<div class="col-sm-6">
<div class="row">

<div class="form-group col-sm-12">
<label>Dirección</label>
</div>

<div class="form-group col-sm-12">
<label><small>Calle</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='calle'  class="form-control">
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-12">
<label><small>Colonia</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='colonia'  class="form-control">
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-6">
<label><small>Número Exterior</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa">#</i>
</div>
<input type="text" name='nExterior'  class="form-control">
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Número Interior</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa">#</i>
</div>
<input type="text" name='nInterior'  class="form-control">
</div>
<!-- /.input group -->
</div>




<div class="form-group col-sm-6">
<label><small>Localidad</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-signs"></i>
</div>
<input type="text" name='localidad'  class="form-control">
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Municipio / Delegación</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag-o"></i>
</div>
<input type="text" name='idMunicipio'    class="form-control">
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>Código Postal</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-map-marker"></i>
</div>
<input type="text" name='cp'    class="form-control">
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-6">
<label><small>Estado</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag"></i>
</div>
<input type="text" name='idEstado'  class="form-control">
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-6">
<label><small>País</small></label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-flag"></i>
</div>
<input type="text" name='pais'  class="form-control">
</div>
<!-- /.input group -->
</div>







</div>

</div>
<!-- fin de col-6 #2 -->

<div class="col-sm-12">


  <div  class="col-sm-12"
  style="background: #f1f1f1;border: solid 2px rgba(0, 0, 0, 0.27);border-radius: 11px;padding: 11px 11px;"
  >


  <div class="form-group col-sm-12">
  <label>Referencia</label>
  </div>

  <div class="form-group col-sm-6">
  <label>Parentesco</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-user"></i>
  </div>
  <input type="text" name='parentesco' class="form-control">
  </div>
  <!-- /.input group -->
  </div>

  <div class="form-group col-sm-6">
  <label>Teléfono</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-phone"></i>
  </div>
  <input type="text" name='telefonoR' class="form-control">
  </div>
  <!-- /.input group -->
  </div>

  <div class="form-group col-sm-12">
  <label>Nombre</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-user"></i>
  </div>
  <input type="text" name='referencia' class="form-control">
  </div>
  <!-- /.input group -->
  </div>



  <div class="form-group col-sm-12">
  <label>Dirección</label>
  <div class="input-group">
  <div class="input-group-addon">
  <i class="fa fa-map"></i>
  </div>
  <input type="text" name='direccionR' class="form-control">
  </div>
  <!-- /.input group -->
  </div>



  </div>


</div>
<!-- fin de col-6 #3 -->





  </div>
<!-- fin de row de modal body -->



    </div>
<!-- final de modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button type="submit" id="submit" class="btn-system btn">
Registrar
</button>
      </div>

      </form>
<?PHP
}
?>


<?PHP
if($_REQUEST['action']=='modalFormMascotas'){ ?>


<!-- contenido de una modal -->
<form form0 result='usuarios'  cde='1_2_php'  name='inicio' show-mod=''  hide-modal='usuarios' class="contact-form" method="post" enctype='multipart/form-data'>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Registrando Mascota</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="add-mascota">


<div class="form-group">
<label>Cliente</label>
<select name='idUsuario' class="form-control" required="true">
<option value="">Seleccionar...</option>
<?php
$consultaUsuario= "SELECT
CONCAT(usuarios.nombre,' ',usuarios.apellido) as usuario, usuarios.idUsuario
FROM usuarios
INNER JOIN clientes
ON clientes.idUsuario=usuarios.idUsuario
WHERE clientes.idEmpresa='$_SESSION[idEmpresa_tkm]'
ORDER BY apellido ASC
";

$resultUsuario = mysqli_query( $GLOBALS["enlace"] , $consultaUsuario);
while($usuario= mysqli_fetch_array($resultUsuario, MYSQLI_ASSOC)){
echo "<option value='$usuario[idUsuario]'>$usuario[usuario]</option>";
}
?>
</select>
</div>

<div class="form-group">
<label>Nombre de la mascota</label>
<input type="text" class="form-control" name="mascota" placeholder="nombre de la mascota">
</div>

<div class="row">

<div class="form-group col-sm-6 ">
<label>Tipo</label>
<input type="text" class="form-control" name="tipo" placeholder="tipo de mascota">
</div>

<div class="form-group col-sm-6 ">
<label>Raza</label>
<input type="text" class="form-control" name="raza" placeholder="raza">
</div>

</div>

<div class="row">

<div class="form-group col-sm-6 ">
<label>Peso</label>
<input type="text" class="form-control" name="peso" placeholder="Peso en Kilos">
</div>

<div class="form-group col-sm-6 ">
<label>Sexo</label>
<select name='sexo' class="form-control" required="true">
<option value="">Seleccionar...</option>
<option value="macho ">Macho</option>
<option value="hembra">Hembra</option>
</select>
</div>

</div>

<div class="form-group">
<label>Propietario</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-phone"></i>
</div>
<input type="text" name='propietario' class="form-control">
</div>
<!-- /.input group -->
</div>

<div class="row">

<div class="form-group col-sm-6">
<label>Fecha de nacimiento</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name='fnacimiento' class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="true">
</div>
<!-- /.input group -->
</div>

<div class="form-group col-sm-6">
<label>Fecha del deceso</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name='fdeceso' class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required="true">
</div>
<!-- /.input group -->
</div>
</div>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button type="submit" id="submit" class="btn-system btn">
Registrar
</button>
      </div>

      </form>
<?PHP
}
?>


<?php


if($_REQUEST['action']=='modalSolicitudIMG'){
 ?>

<?php
$consultaimagen ="SELECT
per_arc.*
FROM per_arc

WHERE
per_arc.idArchivo='$_REQUEST[valor]'
";
$resultimagen= mysqli_query( $GLOBALS["enlace"] , $consultaimagen);
$imagen= mysqli_fetch_array($resultimagen, MYSQLI_ASSOC);
?>

<!-- contenido de una modal -->
<form form0 result='<?php echo "p$_REQUEST[valor2]"; ?>'  cde='0_0_php'  name='formEditArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data' title=''>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Documento</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="edit-doc">
<input type="hidden" name="idArchivo" value="<?php echo $imagen['idArchivo']; ?>" >
<input type="hidden" name="idPersonal" value="<?php echo $_REQUEST['valor2']; ?>" >
<input type="hidden" name="idPerArc" value="<?php echo $imagen['idPerArc']; ?>" >



<div class="form-group">
<label>Documento:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-file-pdf-o"></i>
</div>
<input type="text" class="form-control" name="titulo"  value="<?php echo $imagen['titulo']; ?>">
</div>
<!-- /.input group -->
</div>

<div class="form-group">
<label>Sustituir documento:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="file" class="form-control" name="img" >
</div>
<!-- /.input group -->
</div>



<!-- <img src="<?php echo "system_archivos_media/$imagen[idArchivo].jpg?1".rand(0, 20); ?>" alt="..." class="img-thumbnail" onerror="this.onerror=null;this.src=''";>
 -->
<a class="" target="_blank" href="JavaScript:window.open('system_archivos_media/<?php echo $imagen['idArchivo']; ?>.pdf','documento','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=screen.width,height=screen.height,top=0,left=0');">
<img src="<?php echo "pdf.png?1".rand(0, 20); ?>"
 class="center-block img-thumbnail" onerror="this.onerror=null;this.src=''";>
</a>




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
Aceptar
</button>

      </div>

      </form>
<?PHP
}

 ?>



<?php


if($_REQUEST['action']=='modalSolicitudSUCURSAL'){
 ?>

<?php
$consultaimagen ="SELECT
per_suc.*
FROM per_suc

WHERE
per_suc.idPerSuc='$_REQUEST[valor]'
";
$resultimagen= mysqli_query( $GLOBALS["enlace"] , $consultaimagen);
$imagen= mysqli_fetch_array($resultimagen, MYSQLI_ASSOC);
?>

<!-- contenido de una modal -->
<form form0 result='<?php echo "p$_REQUEST[valor2]"; ?>'  cde='0_0_php'  name='formEditArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data' title=''>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Documento</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="edit-suc">

<input type="hidden" name="idPersonal" value="<?php echo $_REQUEST['valor2']; ?>" >
<input type="hidden" name="idPerSuc" value="<?php echo $imagen['idPerSuc']; ?>" >




<div class="form-group ">
<label>Sucursal:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-building"></i>
</div>
<select class="form-control" name="idSucursal"  require='true'>
<option value=''>seleccionar...</option>";

<?php
$consultaempresas ="SELECT
sucursal.sucursal,sucursal.idSucursal
FROM sucursal

INNER JOIN cue_suc
ON cue_suc.idSucursal=sucursal.idSucursal

WHERE

cue_suc.idCuenta='$_SESSION[idCuenta]'

";
echo $consultaempresas ;

$resultempresas= mysqli_query( $GLOBALS["enlace"] , $consultaempresas);
while($sucursal= mysqli_fetch_array($resultempresas, MYSQLI_ASSOC)){



echo "<option value='$sucursal[idSucursal]' ".($imagen['idSucursal']==$sucursal['idSucursal'] ?'selected':'').">$sucursal[sucursal]</option>";



}
?>
</select>
</div>
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

<button type="submit" id="submit" class="btn-system btn">
Aceptar
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
<form form0 result='<?php echo 'p'.$_REQUEST['valor']; ?>' cde='0_0_php'  name='formaddArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data' title=''>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Documento</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="add-doc">
<input type="hidden" name="idPersonal" value="<?php echo $_REQUEST['valor']; ?>" >

<div class="form-group">
<label>Nombre del documento:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="text" class="form-control" name="titulo" >
</div>
<!-- /.input group -->
</div>

<div class="form-group">
<label>Agregar documento:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-upload"></i>
</div>
<input type="file" class="form-control" name="imagenes" >
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
if($_REQUEST['action']=='modalAgregarSUCURSAL'){
 ?>


<!-- contenido de una modal -->
<form form0 result='<?php echo 'p'.$_REQUEST['valor']; ?>' cde='0_0_php'  name='formaddArchivo' show-mod=''  hide-modal='modalSolicitud' class="contact-form" method="post" enctype='multipart/form-data' title=''>


<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel ">Asignando personal a sucursal</h4>
      </div>
      <div class="modal-body">

<input type="hidden" name="action" value="add-suc">
<input type="hidden" name="idPersonal" value="<?php echo $_REQUEST['valor']; ?>" >





<div class="form-group ">
<label>Sucursal:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-building"></i>
</div>
<select class="select2" name="idSucursal" style='width:100%' required='true'>
<option value=''>Seleccionar</option>

<?php
$consultaempresas ="SELECT
sucursal.sucursal,sucursal.idSucursal
FROM sucursal

INNER JOIN cue_suc
ON cue_suc.idSucursal=sucursal.idSucursal

WHERE

cue_suc.idCuenta='$_SESSION[idCuenta]'

";


$resultempresas= mysqli_query( $GLOBALS["enlace"] , $consultaempresas);
while($sucursal= mysqli_fetch_array($resultempresas, MYSQLI_ASSOC)){

echo "<option value='$sucursal[idSucursal]' >$sucursal[sucursal]
</option>";
}
?>
</select>
</div>
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