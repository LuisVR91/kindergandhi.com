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
<div class="call-action call-action-boxed call-action-style2 clearfix">

<h5 class="primary">Hola <?php echo "$_SESSION[nombre]"; ?></h5>
<p>
<small>
Pulsa el siguiente boton para registrar una nueva actividad.
</small>
</p>


<div class="hr2" style="margin-top:5px; margin-bottom:3px;"></div>

<div link="mod1" mdl="articulosModal" action="modalFormArticulos" cde="1_1_php_modal" value="0" class="btn-system btn-large pull-left ">
Registrar actividad
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

  <select  seleccion='mod1' cde='1_1_php' result='categorias2' action='option-categorias2'
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
<select  seleccion='mod1' action="rango" cde="1_1_PHP" result="rango" name="rango" class="form-control " style="width: 100%;" required>
<option value="mes">Mes Actual</option>
<option value="espesificar">Especificar fecha</option>
</select>
</div>  

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
echo articulosList($grupo,"%","mes");

?>

</div>

</div></div>







<!-- modales -->
