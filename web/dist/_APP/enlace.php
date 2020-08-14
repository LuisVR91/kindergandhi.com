<?PHP
// mb_internal_encoding('UTF-8');
// mb_http_output('UTF-8');
// mb_http_input('UTF-8');
// mb_regex_encoding('UTF-8');


$host              = ($_SERVER["SERVER_NAME"]=='localhost' )? 'localhost' : 'localhost';
$user              = 'inter203_gandhi';
$passw             = '789123654oO$';
$db                = 'inter203_gandhi';
$GLOBALS["enlace"] = mysqli_connect($host, $user, $passw, $db) or die('Error al intentar conectarse a la base de datos.');

mysqli_set_charset($GLOBALS["enlace"], "utf8");

?>

