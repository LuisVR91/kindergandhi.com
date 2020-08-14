<div id="container">
    <!-- Start Header -->
    <div class="hidden-header"></div>

<?php  require('header.php'); ?>

<!-- parte del login-->

<!-- este es el login -->

<div class="section">
<div class="container">

<div class="col-sm-6 col-md-offset-3">



<form form01  cde='log'  name='inicio'  class="contact-form" method="post" enctype='multipart/form-data'>

<h4 class="classic-title text-center"><span>Iniciar Sesión</span></h4>

<div class="form-group ">
<label>Grupo:</label>
<select name="usuario" class="form-control">
<option value="1ro 1">1° 1</option>
<option value="2do 1">2° 1</option>
<option value="2do 2">2° 2</option>
<option value="3ro 1">3° 1</option>
<option value="3ro 2">3° 2</option>
<option value="gandhi2020">Directivos</option>
</select>
</div>

<div class="form-group ">
<label>Contraseña:</label>
<input type="password" class="form-control"  name='passw' placeholder="contraseña">
</div>

<div respuesta="respuesta">
</div>


<div class="form-group pull-right">
<button type="submit" id="submit" class="btn-system btn">
Iniciar
</button>
</div>

</form>

</div>

</div>
</div>



</div>
<?php require('footer.php'); ?>
<!-- /de idCOnteiner -->