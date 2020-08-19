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


<?PHP if($_REQUEST['action']=='rango'){


if($_REQUEST["option"]=="espesificar"){ ?>

<input type="hidden" name="fecha" value="espesificar">

<div class='form-group '>
<div class='input-group'>
<div class='input-group-addon'>
<i class='fa fa-calendar'></i>
</div>
<input  class='form-control fechas' type='text' name="fecha2"
data-date-format='d-m-Y' value="<?PHP echo DATE("d/m/Y"); ?>">


</div>
</div>

<?PHP

}else{
?>

<input type="hidden" name="fecha" value="mes">

<?PHP
}




}

?>

<?PHP if($_REQUEST['action']=='edit-pregunta'){



    
    
        // echo $_REQUEST["idActividad"];
    
        $col1="idPreguntas";
        $col2="respuesta";
    
        $value1=relacion($_REQUEST['idPreguntas']);
        $value2=relacion($_REQUEST['respuesta']);
        
        $consulta= "UPDATE preguntas SET
        $col1=$value1,
        $col2=$value2
        WHERE idPreguntas='$_REQUEST[idPreguntas]' ";
        $result = mysqli_query( $GLOBALS["enlace"] , $consulta);
        
        // echo $consulta;

        include_once("1_1_contenido.php");
        
     
    
        articulosList("%",$_REQUEST['idActividad'],"%", $_REQUEST['idControl']);
        
    
    
    
}
?>


<?PHP if($_REQUEST['action']=='edit-actividad'){



if($_REQUEST['dell']=='eliminar'){


/* --- eliminando obituario ---  */

$consulta= "DELETE FROM actividades
WHERE idActividad='$_REQUEST[idActividad]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);
  // echo "<br> $consulta<br>";
/* --- FIN eliminando obituario ---  */

}else{


    // echo $_REQUEST["idActividad"];

$col1="idGrupo";
$col2="titulo";
$col3="descripcion";
$col4="fecha";


$fecha= date_format(date_create($_REQUEST['fecha']), 'Y-m-d');

$value1=relacion($_REQUEST['idGrupo']);
$value2=relacion($_REQUEST['titulo']);
$value3=relacion($_REQUEST['descripcion']);
$value4=relacion($fecha);

$consulta= "UPDATE actividades SET
$col1=$value1,
$col2=$value2,
$col3=$value3, 
$col4=$value4
WHERE idActividad='$_REQUEST[idActividad]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);


include_once("1_1_contenido.php");


$producto=$_REQUEST['idActividad'];
articulosList("%",$producto,"%", $_REQUEST['idControl']);
}




}
?>



<?PHP 
if($_REQUEST['action']=='add-pregunta'){


    $col1="idActividad";
    $col2="pregunta";
    $col3="fecha";
    $col4="status";
    
    // echo $_REQUEST['fecha'];
    
    $fecha= date('Y-m-d');
    
    $value1=relacion($_REQUEST['idActividad']);
    $value2=relacion($_REQUEST['pregunta']);
    $value3=relacion($fecha);
    $value4=relacion("nueva");
    
    
    
    $consulta = "INSERT INTO preguntas
    ($col1,$col2,$col3,$col4)
    values
    ($value1,$value2,$value3,$value4)";
    
    // echo $consulta;
    $result = mysqli_query( $GLOBALS["enlace"] , $consulta);
    $idActividad=mysqli_insert_id($GLOBALS["enlace"]);
            
    
    include_once("1_1_contenido.php");


    $idActividad=$_REQUEST['idActividad'];
    articulosList("%",$idActividad,"%", $_REQUEST['idControl']);
    
   
// insertar correo

$para = $_REQUEST['mail'];

$titulo = 'Preguntas';

$mensaje = '<html>'.
	'<head><title>Preguntas</title></head>'.
	'<body><h1>pregunta</h1>'.
	"$_REQUEST[pregunta]".
	'<hr>'.
	 "<a href='https://kindergandhi.com.mx/_APP/?p=$_REQUEST[idActividad]' >IR A RESPONDER</a>".
	'</body>'.
    '</html>';
    
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$cabeceras .= 'From: kindergandhi.com.mx';

$enviado = mail($para, $titulo, $mensaje, $cabeceras);

if ($enviado)
  echo 'Email enviado correctamente';
else
  echo 'Error en el envío del email';




}



if($_REQUEST['action']=='add-actividad'){


$col1="idGrupo";
$col2="titulo";
$col3="descripcion";
$col4="fecha";

// echo $_REQUEST['fecha'];

$fecha= date_format(date_create($_REQUEST['fecha']), 'Y-m-d');

$value1=relacion($_REQUEST['idGrupo']);
$value2=relacion($_REQUEST['titulo']);
$value3=relacion($_REQUEST['descripcion']);
$value4=relacion($fecha);



$consulta = "INSERT INTO actividades
($col1,$col2,$col3,$col4)
values
($value1,$value2,$value3,$value4)";

// echo $consulta;
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);
$idActividad=mysqli_insert_id($GLOBALS["enlace"]);


// agregando imagenes

$img_doc_total = count($_FILES['imagenes']['name']);


$hoy=DATE('Y-m-d');

$tipo=$_REQUEST['tipo'];

// echo $tipo;

for ($i=0; $i < $img_doc_total; $i++) {



// echo $_FILES["imagenes"]["tmp_name"][$i];

if($_FILES['imagenes']['tmp_name'][$i]){

	// echo "una iteraccion";
// se agrega a archivos
$consulta2 = "INSERT INTO archivos (fecha, tipo) values ('$hoy', '$tipo') ";

// echo $consulta2;

$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);
$id_archivo = mysqli_insert_id($GLOBALS["enlace"]);
$dir = '../system_archivos_media/';
$imagen=$id_archivo.'.jpg';
$img =$dir.$imagen;

$consulta2 = "INSERT INTO archivos_actividades
( idActividad, idArchivo)
values
('$idActividad', '$id_archivo') ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);




    $file = $_FILES['imagenes']['tmp_name'][$i]; 
        $sourceProperties = getimagesize($file);
        $fileNewName = $id_archivo;
        $folderPath = "../system_archivos_media/";
        // $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $ext = "jpg";
        $imageType = $sourceProperties[2];



       
        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                
              
       

                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext, 0);


                break;
          
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 

          
                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext, 100);

                   break;
            default:
                echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
                exit;
                break;
        }


        move_uploaded_file($file, $folderPath.$fileNewName."_original". ".". $ext);




}
// fin de if si existe la imagen
}
// fin de for de imagenes de documento



include_once("1_1_contenido.php");



echo "<div class='col-sm-6 col-md-offset-3'  respuesta='art$idActividad'>";

articulosList("%",$idActividad,"%", $_REQUEST['idControl']);

echo "</div>";

}
?>

<?php if($_REQUEST['action']=='buscar-articulo'){

include_once("1_1_contenido.php");



// echo "el control es ".$_REQUEST['idControl'];
// $_REQUEST['titulo']=($_REQUEST['titulo']=="")? "%" : $_REQUEST['titulo'];

articulosList($_REQUEST['idGrupo'], "%", $_REQUEST['fecha'], $_REQUEST['idControl']);


}




if($_REQUEST['action']=='add-Archivo'){

$img_doc_total = count($_FILES['imagenes']['name']);

for ($i=0; $i < $img_doc_total; $i++) {
if($_FILES['imagenes']['tmp_name'][$i]){
// se agrega a archivos

$hoy=date("Y-m-d");

$tipo=$_REQUEST['tipo'];


$consulta2 = "INSERT INTO archivos (fecha, tipo) values ( '$hoy', '$tipo') ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);


$id_archivo = mysqli_insert_id($GLOBALS["enlace"]);
$dir = '../system_archivos_media/';
$imagen=$id_archivo.'.jpg';
$img =$dir.$imagen;
$consulta2 = "INSERT INTO archivos_actividades
(idActividad, idArchivo)
values
('$_REQUEST[idActividad]', '$id_archivo') ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);
// echo $consulta2;



    $file = $_FILES['imagenes']['tmp_name'][$i]; 
        $sourceProperties = getimagesize($file);
        $fileNewName =  $id_archivo;
        $folderPath = "../system_archivos_media/";
        // $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $ext = "jpg";
        $imageType = $sourceProperties[2];


        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
               
                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext, 0);


                break;
          
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 

                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext, 100);

                   break;
            default:
                echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
                exit;
                break;
        }





        move_uploaded_file($file, $folderPath.$fileNewName."_original". ".". $ext);



}
// fin de if si existe la imagen
}


include_once("1_1_contenido.php");


$idActividad=$_REQUEST['idActividad'];
articulosList("%",$idActividad,"%",$_REQUEST['idControl']);
}




if($_REQUEST['action']=='add-video'){



if($_REQUEST['tipo']=="video"){


$col0="productoVar1";
$value0="video";

$consulta= "UPDATE titulos SET
$col0='$value0'
WHERE idActividad='$_REQUEST[idActividad]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);

// echo $consulta;


}

// se agrega a archivos

$hoy=date("Y-m-d");

$tipo=$_REQUEST['tipo'];



// https://www.youtube.com/watch?v=7TTHsRrK7So
$extencion= explode ( "?v=" , $_REQUEST['extencion']);

$video= $extencion[1];

$consulta2 = "INSERT INTO archivos (fecha, tipo, extencion) values ( '$hoy', '$tipo', '$video') ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);


$id_archivo = mysqli_insert_id($GLOBALS["enlace"]);

$consulta2 = "INSERT INTO archivos_actividades
(idActividad, idArchivo)
values
('$_REQUEST[idActividad]', '$id_archivo') ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta2);





include_once("1_1_contenido.php");


$idActividad=$_REQUEST['idActividad'];
articulosList("%",$idActividad,"%",$_REQUEST['idControl']);
}


?>


<?php
if($_REQUEST['action']=='edit-Archivo'){

if(!isset($_REQUEST['dell-archivo'])){ $_REQUEST['dell-archivo']='false'; }

if($_REQUEST['dell-archivo']=='eliminar'){

$consulta= "DELETE FROM archivos_actividades
WHERE idArchivo='$_REQUEST[idArchivo]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);

@unlink("../system_archivos_media/$_REQUEST[idArchivo].jpg");
@unlink("../system_archivos_media/$_REQUEST[idArchivo]_car.jpg");
@unlink("../system_archivos_media/$_REQUEST[idArchivo]_gal.jpg");
@unlink("../system_archivos_media/$_REQUEST[idArchivo]_original.jpg");


}else{



if($_FILES['img']['tmp_name']){
// se agrega a archivos

$dir = '../system_archivos_media/';
$imagen=$_REQUEST['idArchivo'].'.jpg';
$img =$dir.$imagen;



        $file = $_FILES['img']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName =  $_REQUEST['idArchivo'];
        $folderPath = "../system_archivos_media/";
        // $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $ext = "jpg";
        $imageType = $sourceProperties[2];



        switch ($imageType) {
            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
            

                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext, 0);


                break;
         
            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 

               
                $targetLayer = ajustar(1300,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext, 100);

                   break;
            default:
                echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
                exit;
                break;
        }

  


        move_uploaded_file($file, $folderPath.$fileNewName."_original". ".". $ext);
      


// fin de if si existe la imagen}
}



}


include_once("1_1_contenido.php");


$idActividad=$_REQUEST['idActividad'];
articulosList("%",$idActividad,"%", $_REQUEST['idControl']);

}

if($_REQUEST['action']=='edit-video'){

if(!isset($_REQUEST['dell-archivo'])){ $_REQUEST['dell-archivo']='false'; }

if($_REQUEST['dell-archivo']=='eliminar'){

$consulta= "DELETE FROM archivos_actividades
WHERE idArchivo='$_REQUEST[idArchivo]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);



if($_REQUEST['tipo']=="video"){


$col0="productoVar1";
$value0="imagen";

$consulta= "UPDATE titulos SET
$col0='$value0'
WHERE idActividad='$_REQUEST[idActividad]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);

}



}else{


if($_REQUEST['tipo']=="video"){


$col0="productoVar1";
$value0="video";

$consulta= "UPDATE titulos SET
$col0='$value0'
WHERE idActividad='$_REQUEST[idActividad]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);

}


// https://www.youtube.com/watch?v=7TTHsRrK7So
$extencion= explode ( "?v=" , $_REQUEST['extencion']);



$col1="extencion";


$value1=relacion($extencion[1]);


$consulta= "UPDATE archivos SET
$col1=$value1
WHERE idArchivo='$_REQUEST[idArchivo]' ";
$result = mysqli_query( $GLOBALS["enlace"] , $consulta);




}


include_once("1_1_contenido.php");


$idActividad=$_REQUEST['idActividad'];
articulosList("%",$idActividad,"%", $_REQUEST['idControl']);


}

if($_REQUEST['action']=='option-categorias'){

?>

<label>Categoria:</label>
<select
name="categoria" class="form-control " style="width: 100%;" >
<option value="">Sin categoria</option>
<?php
/* --- hallando secciones ---  */
$consultaSECCION ="SELECT categorias.*
FROM categorias
WHERE categorias.idSeccion='$_REQUEST[option]'
   ";


$resultSECCION= mysqli_query( $GLOBALS["enlace"] , $consultaSECCION);
while($seccion= mysqli_fetch_array($resultSECCION, MYSQLI_ASSOC)){

echo "<option value='$seccion[idGrupo]' >$seccion[categoria]</option>";



} ?>

</select>

<?PHP
}

if($_REQUEST['action']=='option-categorias2'){

?>

<label>Categoria:</label>
<select
name="categoria" class="form-control " style="width: 100%;" required>
<option value="%">todas</option>
<?php
/* --- hallando secciones ---  */
$consultaSECCION ="SELECT categorias.*
FROM categorias
WHERE categorias.idSeccion='$_REQUEST[option]'
   ";


$resultSECCION= mysqli_query( $GLOBALS["enlace"] , $consultaSECCION);
while($seccion= mysqli_fetch_array($resultSECCION, MYSQLI_ASSOC)){

echo "<option value='$seccion[idGrupo]' >$seccion[categoria]</option>";



} ?>

</select>

<?PHP
}

?>