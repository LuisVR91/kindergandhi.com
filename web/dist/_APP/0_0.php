<!-- encaebzado de la pagina -->
<div class="page-banner" style="padding:33px 0;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Clonar Archivos</h2>
            <p> </p>
          </div>
          
        </div>
      </div>
    </div>
<!-- fin  encaebzado de la pagina -->


<div class="section">
<div class="container">


<!-- registro de clientes y mascotas -->
<div class="row">

<div class="col-sm-8 col-sm-offset-2">

</div>
<!-- fin de col-sm-6 -->


<!-- fin de col-sm-6 -->
</div>


<div class="hr1" style="margin-top:10px; margin-bottom:30px;"></div>


<div class="row">
  <div class="hr0" style="margin-top:0px; margin-bottom:0px;"></div>

</div>
<div class="row">

<div class="col-sm-12 call-action call-action-boxed call-action-style2 clearfix">

<form form0 result='personal'  cde='0_0_php'  name='buscar' show-mod=''  hide-modal='' class="contact-form" method="post" enctype='multipart/form-data'>


<input type="hidden" name='action' value='mover'>

<div class="row">


<div class="form-group col-sm-4">
<label>Carpeta:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-link"></i>
</div>
<input type="text" name='dir'  class="form-control"
value="<?php echo getcwd(); ?>">
</div>
<!-- /.input group -->
</div>

<?php
 // echo $_SERVER['REQUEST_URI'];
 ?>

<div class="form-group col-sm-4">
<label>Archivos a mover:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-link"></i>
</div>
<input type="text" name='mover'  class="form-control" >
</div>
<!-- /.input group -->
</div>


<div class="form-group col-sm-4">
<label>copiar con nombre:</label>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-link"></i>
</div>
<input type="text" name='resultante'  class="form-control" >
</div>
<!-- /.input group -->
</div>



</div>

<div class="row">
<div class="col-sm-12">

<button type="submit" id="submit" class="btn-system btn pull-right">
Buscar
</button>
</div>


</div>

</form>
</div>
</div>

<div class="hr2" style="margin-top:10px; margin-bottom:30px;"></div>
<div respuesta='personal' class="row">

<?php


?>
</div>





</div>
<!-- fin de seection -->
</div>
<!--fin de conteiner  -->