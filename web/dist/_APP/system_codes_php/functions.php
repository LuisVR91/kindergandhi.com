<?php
@session_start();




if(isset($_REQUEST['action'])){


       if($_REQUEST['action']=='suc_pr'){
 $_SESSION['idSucursal_p']=$_REQUEST['option'];
echo  $_SESSION['idSucursal_p'];
       }

}



function cortar($b,$h,$imageResourceId,$bo,$ho) {


    
    $resolucion="horizontal";
//     echo "orizontal";
    $hn =$h;
    
    $bn= ($hn*$bo)/$ho;
    

    
            $targetWidth =$b;
            $targetHeight =$h;
    
    
    
// si no alcanza al ancho se hace un zoom
if($bn<$b){
$bn = $b;
$hn = ($ho*$bn)/$bo ;
}

$xo=-($bn-$b)/2;
$yo=-($hn-$h)/2;



            $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
            imagecopyresampled($targetLayer,$imageResourceId,$xo,$yo,0,0,$bn,$hn, $bo,$ho);
    
    
    
    
    
    // echo "$resolucion <br> Ancho $bn X alto: $hn,  xo: ".@$xo.@$yo;
            
    
         
    // $_SESSION['nuevoantes']=$bn;

    $resultado = $targetLayer;
    $resultado = agua(500, $bn, $hn, $targetLayer);
            return $resultado ;
    
        
        }



    function cuadrada($yx,$imageResourceId,$bo,$ho) {




if($bo>$ho){

$resolucion="horizontal";
// echo "orizontal";

$bn= ($yx*$bo)/$ho;
$hn =$yx;



        $targetWidth =$yx;
        $targetHeight =$yx;


$xo=-($bn-$yx)/2;

        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,$xo,0,0,0,$bn,$hn, $bo,$ho);


}else{


$resolucion="vertical";

// en caso de ser horizontal

$bn =$yx;
$hn=($bn*$ho)/$bo ;



        $targetWidth =$yx;
        $targetHeight =$yx;


        $yo=-($hn-$yx)/2;
        $xo=($bn-$bn)/2;
        
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,$yo,0,0,$bn,$hn, $bo,$ho);



}


// echo "$resolucion <br> Ancho $bn X alto: $hn,  xo: ".@$xo.@$yo;
        

     
$_SESSION['nuevoantes']=$bn;
        $resultado = agua($yx, $yx, $yx, $targetLayer);
        return $resultado ;

    
    }




    function ajustar($yx,$imageResourceId,$bo,$ho) {


if($bo>$ho){

$resolucion="horizontal $yx";

// en caso de ser horizontal

$bn =$yx;

$hn= ($bn*$ho)/$bo;

        $targetWidth =$bn;
        $targetHeight =$hn;


$xo=0;

        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,$xo,0,0,0,$bn,$hn, $bo,$ho);


}else{


$resolucion="vertical";

// en caso de ser horizontal

$hn =$yx;
$bn= ($hn*$bo)/$ho;



         $targetWidth =$bn;
        $targetHeight =$hn;

$yo=0;

        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
 

        imagecopyresampled($targetLayer,$imageResourceId,0,$yo,0,0,$bn,$hn, $bo,$ho);
           
}

// echo "<br>AJUSTADA $resolucion <br> Ancho $bn X alto: $hn,  xo: ".@$xo.@$yo;
        

$resultado = agua($yx, $bn, $hn, $targetLayer);
        return $resultado ;

    }



function agua($medida, $fondob, $fondoh, $fondo){


switch ($medida) {
    case '1300':
        $medida = "500";
        break;
    
        case '500':
        $medida = "300";
        break;

        case '50':
        $medida = "40";
        break;
    
    default:
        # code...
        break;
}


 $tagua = getimagesize("$medida.png");
$fileAgua = imagecreatefrompng("$medida.png");


$ab=$tagua[0];
$ah=$tagua[1];



// estos son los tamaños del agua redimenciandos a la nueva imagen
$abn= $ab;
$ahn = $ah;

$_SESSION['nuevo']=$abn;


// Creamos las dos imágenes a utilizar
$imagen1 = $fondo;

$xa=($fondob-$abn)/2;
$ya=($fondoh-$ahn)/2;



// hace transparente la imagen

imagesavealpha($fileAgua, true);

imagecopymerge($imagen1,$fileAgua,$xa,$ya,0,0,$abn,$ahn, 50);



// imagecopyresampled($imagen1, $fileAgua,$xa,$ya,0,0,$abn,$ahn,$ab,$ah);



// // Copiamos una de las imágenes sobre la otra
// imagecopymerge($imagen1,$layerAgua,$xa,$ya,0,0,$abn,$ahn, 90);


return $imagen1;
}


function aguaRespaldo($porcentaje, $fondob, $fondoh, $fondo){


 $tagua = getimagesize("agua.png");
$fileAgua = imagecreatefrompng("agua.png");


$ab=$tagua[0];
$ah=$tagua[1];



// estos son los tamaños del agua redimenciandos a la nueva imagen
$abn= ($porcentaje * $fondob)/100;
$ahn = ($abn*$ah)/$ab;

$_SESSION['nuevo']=$abn;

$layerAgua=imagecreatetruecolor($abn,$ahn);

// hace transparente la imagen
imagesavealpha($layerAgua, true);
$trans_colour = imagecolorallocatealpha($layerAgua, 0, 0, 0, 127);
imagefill($layerAgua, 0, 0, $trans_colour);

$xa=($fondob-$abn)/2;
$ya=($fondoh-$ahn)/2;


imagecopyresampled($layerAgua,$fileAgua,0,0,0,0,$abn,$ahn, $ab,$ah);



// Creamos las dos imágenes a utilizar
$imagen1 = $fondo;




// Copiamos una de las imágenes sobre la otra
    // imagecopy($imagen1,$layerAgua,$xa,$ya,0,0,$abn,$ahn);
imagecopymerge($imagen1,$layerAgua,$xa,$ya,0,0,$abn,$ahn, 30);

return $imagen1;
}


function text($texto){
    // $texto=str_replace("\r","&nbsp;",$texto);
     // $texto=str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;    ",$texto);
     $texto=str_replace("<","&lt;",$texto);
     $texto=str_replace(">","&gt;",$texto);
     $texto=str_replace("'","&#39;",$texto);
     $texto=str_replace('"','&#34;',$texto);
     $texto=str_replace("\n","<br>",$texto);
     echo  $texto;
     }

     function textr($texto){
    $texto=str_replace("<br>","\n",$texto);
     echo  $texto;
     }
       function textb($texto){
    $texto=str_replace("<br>","",$texto);
     echo  $texto;
     }

function relacion($value){


       $value=str_replace("\r","",$value);
     $value=str_replace("\t","",$value);


       // $value=str_replace("\r","&nbsp;",$value);
     // $value=str_replace("\t","&nbsp;&nbsp;&nbsp;&nbsp;",$value);
     $value=str_replace("<","&lt;",$value);
     $value=str_replace(">","&gt;",$value);
     $value=str_replace("'","&#39;",$value);
     $value=str_replace('"','&#34;',$value);
     $value=str_replace("\n","<br>",$value);


    if(($value!='') OR ($value!="")){$value = "'".$value."'"; }elseif(($value=='') OR ($value=="")){$value= "NULL";
}elseif(($value==NULL) OR ($value==FALSE) OR ($value==UNDEFINE)){$value= "NULL";}
return $value;
}


function mes($mes){

if(((int)$mes)==1){ return "ENERO";}
elseif(((int)$mes)==2){ return "FEBRENO";}
elseif(((int)$mes)==3){ return "MARZO";}
elseif(((int)$mes)==4){ return "ABRRIL";}
elseif(((int)$mes)==5){ return "MAYO";}
elseif(((int)$mes)==6){ return "JUNIO";}
elseif(((int)$mes)==7){ return "JULIO";}
elseif(((int)$mes)==8){ return "AGOSTO";}
elseif(((int)$mes)==9){ return "SEPTIEMBRE";}
elseif(((int)$mes)==10){ return "OCTUBRE";}
elseif(((int)$mes)==11){ return "NOVIEMBRE";}
elseif(((int)$mes)==12){ return "DICIEMBRE";}else{ return " ";}

}

 function edad($fecha){



$fecha0=str_replace('/','-',$fecha);


$dia=date_format(date_create($fecha0), 'd');
$mes=date_format(date_create($fecha0), 'm');
$ano=date_format(date_create($fecha0), 'Y');


    $dias = mktime(0,0,0,$dia,$mes,$ano);
    $edad = (int)((time()-$dias)/31556926 );
    return $edad;
     }
  // Formato: dd-mm-yy
// echo edad(“01-10-1989”);



 ?>