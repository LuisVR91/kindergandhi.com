<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=$_REQUEST[nombrexx].xls");
header("Pragma: no-cache");
header("Expires: 0");

$dados_recebido = iconv('utf-8','iso-8859-1',$_POST['datos_a_enviar']);
echo $dados_recebido;


// if (isset($_POST['datos_a_enviar']) && $_POST['datos_a_enviar'] != '') echo $_POST['datos_a_enviar'];}
?>