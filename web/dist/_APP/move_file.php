<?php
session_start();
 
date_default_timezone_set('America/Mexico_City');

header('Content-Type: text/html; charset=UTF-8');
require('system_codes_php/enlace.php');

// session_set_cookie_params(10);

include_once('system_codes_php/functions.php');




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

 <link rel="stylesheet" href="css/system.css" type="text/css" media="screen">
 <!-- Bootstrap CSS  -->
 <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">


 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
 <!-- Slicknav -->
 <link rel="stylesheet" type="text/css" href="css/slicknav.css" media="screen">
 <!-- Margo CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
 <!-- Responsive CSS Styles  -->
 <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">
 <!-- Css3 Transitions Styles  -->
 <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">
 <!-- Color CSS Styles  -->
<link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="green" media="screen" />


<!--|||||||||   plugins  ||||||||||| -->

<!-- sweetalert -->
<script src="system_codes_js/plugins/sweetalert/dist/sweetalert.js"></script>
<link rel="stylesheet" href="system_codes_js/plugins/sweetalert/dist/sweetalert.css">
<!--/ sweetalert -->

<!-- Formulario multiple -->
 <link href="system_codes_js/plugins/wizard/custom.css" rel="stylesheet">
<!--/ Formulario multiple -->
<!-- ||||||||| / plugins  ||||||||||| -->


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
  <link rel="stylesheet" href="htttitulo://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="htttitulo://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



<!-- Fecha -->
<link rel="stylesheet" href="system_codes_js/plugins/flatpickr/flatpickr.min.css">

<link rel="stylesheet" href="system_codes_js/plugins/flatpickr/plugins/confirmDate/confirmDate.css">
<script src="system_codes_js/plugins/flatpickr/flatpickr.js"></script>

<!-- <link rel="stylesheet" href="htttitulo://unpkg.com/flatpickr/dist/flatpickr.min.css"> -->
<!-- <script src="htttitulo://unpkg.com/flatpickr"></script> -->


</head>

<body>




<div id="container">
   <div class="hidden-header"></div>



<?php

// manda a llamar las paginas de cada opcion cuando se selecciona


  require("system_pages/0_0_modal.php");

include_once("system_pages/0_0_contenido.php");


include_once("0_0.php");


?>







</div>






  <!-- Go To Top Link -->
  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Style Switcher -->


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


<!-- plugin de fomulario-->
<!-- page script -->


</body>



</html>