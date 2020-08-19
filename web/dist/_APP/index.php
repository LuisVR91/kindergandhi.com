<?php
session_start();
 
date_default_timezone_set('America/Mexico_City');

header('Content-Type: text/html; charset=UTF-8');
require('system_codes_php/enlace.php');

// session_set_cookie_params(10);


include_once('system_codes_php/functions.php');
// echo "hola despeus de funcion";




if(!isset($_SESSION['login_tkm'])){ $_SESSION['login_tkm']='false'; }
if(!isset($_SESSION['autentificacion_tkm'])){ $_SESSION['autentificacion_tkm']=''; }

if($_REQUEST['option']==-1){
  include('system_codes_php/offlog.php');
}


?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>

  <!-- Basic -->
  <title>Control</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="Control">
  <meta name="author" content="interdual">
    <link rel="icon" type="image/png" href="favicon.png">

 <link rel="stylesheet" href="cssCONTROL/system.css" type="text/css" media="screen">
 <!-- Bootstrap CSS  -->
 <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">


 <!-- Font Awesome CSS -->
 <!-- <link rel="stylesheet" href="cssCONTROL/font-awesome.css" type="text/css" media="screen"> -->
 <!-- Slicknav -->
 <link rel="stylesheet" type="text/css" href="cssCONTROL/slicknav.css" media="screen">
 <!-- Margo CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="cssCONTROL/style.css" media="screen">
 <!-- Responsive CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="cssCONTROL/responsive.css" media="screen">
 <!-- Css3 Transitions Styles  -->
 <link rel="stylesheet" type="text/css" href="cssCONTROL/animate.css" media="screen">
 <!-- Color CSS Styles  -->
<link rel="stylesheet" type="text/css" href="cssCONTROL/colors/blue.css" title="green" media="screen" />


<!--|||||||||   plugins  ||||||||||| -->

<!-- sweetalert -->
<script src="system_codes_js/plugins/sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="system_codes_js/plugins/sweetalert/dist/sweetalert.css">
<!--/ sweetalert -->

<!-- Formulario multiple -->
 <link href="system_codes_js/plugins/wizard/custom.css" rel="stylesheet">
<!--/ Formulario multiple -->
<!-- ||||||||| / plugins  ||||||||||| -->

<!-- jquery-ui -->
<link rel="stylesheet" href="system_codes_js/plugins/DragAndDrop/jquery-ui.css">

  <!-- Margo JS  -->
  <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/jquery.migrate.js"></script>
  <script type="text/javascript" src="js/modernizrr.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.fitvids.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="js/jquery.appear.js"></script>
  <script type="text/javascript" src="js/count-to.js"></script>
  <script type="text/javascript" src="js/jquery.textillate.js"></script>
  <script type="text/javascript" src="js/jquery.lettering.js"></script>
  <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
  <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
  <script type="text/javascript" src="js/jquery.parallax.js"></script>
  <script type="text/javascript" src="js/jquery.slicknav.js"></script>

<!-- plugins extra -->
<script src="system_codes_js/plugins/input-mask/jquery.inputmask.js"></script>
<script src="system_codes_js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="system_codes_js/plugins/input-mask/jquery.inputmask.extensions.js"></script>



<script src="system_codes_js/plugins/select2/select2.full.js"></script>
<!-- <script src="system_codes_js/plugins/select2/select2.js"></script> -->
<link rel="stylesheet" href="system_codes_js/plugins/select2/select2.css">


<script src="system_codes_js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="system_codes_js/plugins/timepicker/bootstrap-timepicker.min.css">
  <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



  <!-- DataTables -->
  <link rel="stylesheet" href="system_codes_js/plugins/datatables/dataTables.bootstrap.css">

    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



<!-- Fecha -->
<link rel="stylesheet" href="system_codes_js/plugins/flatpickr/flatpickr.min.css">

<link rel="stylesheet" href="system_codes_js/plugins/flatpickr/plugins/confirmDate/confirmDate.css">
<script src="system_codes_js/plugins/flatpickr/flatpickr.js"></script>

<!-- <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css"> -->
<!-- <script src="https://unpkg.com/flatpickr"></script> -->


</head>

<body>


<?php

if($_SESSION['login_tkm']=='false'){

include('login.php');

 }

/* opciones de menu*/
if($_SESSION['login_tkm']=='active'){

include('app.php');

}
/* END  opciones de menu*/


  ?>




  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Style Switcher -->
<!-- page script -->





  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="system_codes_js/style.js"></script>
  <script type="text/javascript" src="system_codes_js/ajax_form.js"></script>

  <script type="text/javascript" src="system_codes_js/functions.js"></script>

<!-- plugin de fomulario-->

  <script type="text/javascript" src="system_codes_js/plugins/wizard/jquery.smartWizard.js"></script>


<!-- nuevos31/01/2016 06:03 -->

<!-- DataTables -->
<script src="system_codes_js/plugins/datatables/jquery.dataTables.js"></script>
<script src="system_codes_js/plugins/datatables/dataTables.bootstrap.js"></script>


<!-- Text area -->
<!-- <script src='system_codes_js/plugins/textarea/autoSize/autosize.js'></script>
<script src='system_codes_js/plugins/textarea/autoSize/jquery.autosize.js'></script> -->
<!--/ Text area -->

 <script type="text/javascript" src="system_codes_js/ajax_asignation_functions.js"></script>

 <script type="text/javascript" src="system_codes_js/plugins/flatpickr/plugins/confirmDate/confirmDate.js"></script>

<!--  <script src="system_codes_js/plugins/DragAndDrop/jquery.js"></script> -->
  <script src="system_codes_js/plugins/DragAndDrop/jquery-ui.js"></script>


<!-- plugin de fomulario-->

</body>



</html>