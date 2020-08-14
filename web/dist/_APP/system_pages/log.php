<?php
session_start();
 
require('../system_codes_php/enlace.php');
date_default_timezone_set('America/Mexico_City');


if($_REQUEST['usuario']==''){ $_REQUEST['usuario']='none'; }
if($_REQUEST['passw']==''){ $_REQUEST['passw']='none'; }




$consulta= "SELECT
control.idControl ,control.usuario, control.pass, control.nombre, grupos.idGrupo

FROM control

LEFT JOIN grupos
ON control.idControl= grupos.idControl

WHERE

(control.usuario='$_REQUEST[usuario]')
and  control.pass='$_REQUEST[passw]'";


$result = mysqli_query( $GLOBALS["enlace"] , $consulta);
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);


if($row['idControl']){
// echo "Enlace correcto.... <BR> Cargando....";

$_SESSION['login_tkm']='active';

$_SESSION['idGrupo']="$row[idGrupo]";
$_SESSION['idControl']="$row[idControl]";
$_SESSION['nombre']="$row[nombre] ";
$_SESSION['apellido']="" ;
$_SESSION['puesto_tkm']="" ;
$_SESSION['idEmpresa_tkm']="" ;



$_SESSION['permisos_tkm'] = 'administrador';

$data['refresh']='true';

echo json_encode($data, JSON_FORCE_OBJECT);
exit();



}else{

/*echo "Enlace incorrecto.... <BR> Cargando....";*/

$_SESSION['login_tkm']='false';
$_SESSION['autentificacion_tkm']='error';

/* id de la modal a cerrar*/
$data['hidemod']=null;

/*id de la modal a mostrar*/
$data['showmod']=null;



/*true si se refresca la pagina*/
$data['refresh']='false';

/*respuestas que manda*/
$data['respuesta']['div'][0]="[respuesta='respuesta']";
$data['respuesta']['contenido'][0]="el usuario o contraseña no existen";


/*||||| alerta ||||*/

/*textos de titulo y texto secundario*/
$data['alert']['title']=' Error al iniciar sesión';

$data['alert']['text']="<p>La informacion de autentificacion es incorrecta</p>
 <p>Ingresar los datos nuevamente</p>";

/*tipo de alerta type: "info", type: "success", type: "warning", type: "error", */
$data['alert']['type']='error';

// ruta de alguna imagen
$data['alert']['img']=null;
$data['alert']['imageSize']=null;

/*mostar los botones confirmar y cancelar*/
$data['alert']['showCancelButton']=false;
$data['alert']['showConfirmButton']=false;

/*txtos de los botones*/
$data['alert']['confirmButtonText']='OK';
$data['alert']['cancelButtonText']='cancelat';

/*clase del boton de confirmar*/
$data['alert']['confirmButtonClass']='btn-primary';

/*cerrar ventana al precional el boton*/
$data['alert']['closeOnConfirm']=true;
$data['alert']['closeOnCancel']=true;

/*milisegundos en los que se cierra la alerta*/
$data['alert']['timer']=3000;





echo json_encode($data, JSON_FORCE_OBJECT);
exit();



}




 ?>