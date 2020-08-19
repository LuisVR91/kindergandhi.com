<!-- encaebzado de la pagina -->
<div class="page-banner" style="padding:33px 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Actividades</h2>
            <p> </p>
          </div>
          <div class="col-md-6">
            <ul class="breadcrumbs">
              <li><a href="#">Sistema para padres</a></li>
              <li>Actividades</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

<!-- fin  encaebzado de la pagina -->




<div class="section">
<div class="container">
<?PHP 
if($_SESSION['idControl']==1){
  ?>

<div class="row">
<div class="col-sm-12">
  <div class="call-action call-action-boxed call-action-style2 clearfix">
<div class="row">
  <div class="col-sm-12">
  <h5 class="primary">Hola <?php echo "$_SESSION[nombre]"; ?></h5>

</div>    
<div class="col-sm-12">
  
      <p>
      
      Pulsa el siguiente boton para registrar una nueva actividad.
      <br>


</div>
<div class="col-sm-12">
  
  <div link="mod1" mdl="articulosModal" action="modalFormArticulos" cde="1_1_php_modal" value="0" class="btn-system btn-large pull-left ">
  <span>Registrar actividad</span>
  </div>

</div>
    
    
</div>
  
  </div>
</div>
</div>

<?PHP 
}
?>
<!-- fin de row -->

<div class="hr2" style="margin-top:10px; margin-bottom:30px;"></div>

<div class="row">

<div class="col-sm-12">

<form form0 result='articulos'  cde='1_1_php'  name='buscar' show-mod=''  hide-modal='' class="contact-form" method="post" enctype='multipart/form-data'>


<input type="hidden" name='action' value='buscar-articulo'>
<input type="hidden" name='tipo' value='slider'>
<input type="hidden" name='seccion' value='index'>

<div class="row">

<div class="col-sm-4 col-sm-offset-4">
  
  <div class="form-group ">

<?PHP 
if($_SESSION['idControl']==1){
?>

<label>Grupos:</label>
<?PHP
}
?>


<?PHP 
if($_SESSION['idControl']!=1){
  ?>
  <label>Grupo:</label>

<?PHP
}
?>

  <select  
  name="idGrupo" class="form-control " style="width: 100%;" required>
 
  <?php
  /* --- hallando secciones ---  */
  $consultaSECCION ="SELECT grupos.*
  FROM grupos
     ";
  
if($_SESSION['idControl']!=1){
  $consultaSECCION.=" 
  WHERE grupos.idControl = $_SESSION[idControl]
  LIMIT 1";
}else{
?>
 <option value="%">Todos</option>
<?PHP
}

  
  $resultSECCION= mysqli_query( $GLOBALS["enlace"] , $consultaSECCION);
  while($seccion= mysqli_fetch_array($resultSECCION, MYSQLI_ASSOC)){
  
    
    if($_SESSION['idControl']!=1){
      
      echo "<option value='$seccion[idGrupo]' ".($_SESSION['idGrupo']==$seccion['idGrupo'] ?'selected':'').">$seccion[idGrupo]</option>";
    }
    
    if($_SESSION['idControl']==1){
      echo "<option value='$seccion[idGrupo]' >$seccion[grupo]</option>";
      
        }



  
  }
  /* --- fin hallando secciones ---  */
  
   ?>
  </option>
  
  
  </select>
  </div>

  

  <div class="form-group">

<label>Fecha</label>
<select  seleccion='mod1' action="rango" cde="1_1_php" result="rango" name="rango" class="form-control " style="width: 100%;" required>
<option value="mes">Mes Actual</option>
<option value="espesificar">Especificar fecha</option>
</select>
</div>  
<input type="hidden" name="idControl" value="<?PHP echo $_SESSION['idControl']; ?>">

<div respuesta="rango" >
<input type="hidden" name="fecha" value="mes">
</div>





  <button type="submit" id="submit" class="btn-system btn pull-right">
  Buscar
  </button>
</div>


</div>

</form>
</div>
</div>
<div class="hr2" style="margin-top:10px; margin-bottom:30px;"></div>

<div class="row" respuesta='articulos'>
<?PHP


if($_SESSION['idGrupo']){
$grupo = $_SESSION['idGrupo'];

}else{
  $grupo = "%";
}


if(isset($_REQUEST['actividad'])){
  $actividad = $_REQUEST['actividad'];
  ?>
  
  <div class="col-sm-6 col-md-offset-3" respuesta="art<?PHP echo $actividad; ?>">
  <?PHP
  echo articulosList($grupo,$actividad,"mes", $_SESSION['idControl']);
?>
</div>

<?PHP
}else{
  $actividad = "%";
  echo articulosList($grupo,$actividad,"mes", $_SESSION['idControl']);
}


?>

</div>

</div></div>







<!-- modales -->
