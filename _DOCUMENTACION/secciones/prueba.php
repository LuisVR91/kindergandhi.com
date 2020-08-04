
<div style="
  
  text-align: center;
    display: block;

">

<!-- 1300 X 470 -->

<!--
    <img src="prueba-editada_car.jpg" alt="">
    <img src="prueba-editada.jpg" alt=""> 
-->
    
</div>

<?php
@session_start();



for ($i=1; $i <= 2; $i++) { 
    
imagen("($i)", "jpg", "jpg");

echo "$i <br>";
}


function imagen($nombre, $extencion, $pextencion){



    $nombre = $nombre;

    $file = "$nombre.jpg";
    $ext = $pextencion;
    $fileNewName = "$nombre";
    $sourceProperties = getimagesize("$file");
    
    $imageType = $sourceProperties[2];
    
    $folderPath ="OP/";
    
    
    switch ($imageType) {
        case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file); 
            
              
            $targetLayer = cuadrada(450,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagepng($targetLayer,$folderPath. "op ". $fileNewName.".".$ext, 0);
    
            $targetLayer = ajustar(900,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagepng($targetLayer,$folderPath. $fileNewName.".". $ext, 0);
    
    
            break;
     
      
            case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file); 
           
            $targetLayer = cuadrada(450,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagejpeg($targetLayer,$folderPath. "op ".$fileNewName.".".$ext, 100);
    
            $targetLayer = ajustar(900,$imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagejpeg($targetLayer,$folderPath. "".$fileNewName.".".$ext, 100);
    
               break;
        default:
            echo "Las imagenes solo puedes ser: .JPG .PNG o .GIF";
            exit;
            break;
    }
    
    
    
    
    
    move_uploaded_file($file, $folderPath.$fileNewName."_original". ".". $ext);
    
    
    
    
    
    

}



function cortar($b,$h,$imageResourceId,$bo,$ho) {
    
    
        
    $resolucion="horizontal";
    echo "orizontal";
    $hn =$h;
    
    $bn= ($hn*$bo)/$ho;
    
    echo $hn;
    
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
    //         $resultado = agua($b, $h, $b, $targetLayer);
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


echo $hn;

echo $bn. "<br>";


}


// echo "$resolucion <br> Ancho $bn X alto: $hn,  xo: ".@$xo.@$yo;
        

     
$_SESSION['nuevoantes']=$bn;
        // $resultado = agua($yx, $yx, $yx, $targetLayer);
        return $targetLayer ;

    
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
        

// $resultado = agua($yx, $bn, $hn, $targetLayer);
        return $targetLayer ;

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


 ?>