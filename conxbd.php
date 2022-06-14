

<?
session_start();
// ----------------- Pour afficher les erreurs

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);

$dbhost = 'sql102.iceiy.com';
$db     = 'icei_31749124_mysmartschool'  ;
$dbuser = 'icei_31749124';
$dbpass = 'wZOWzrXUvE6a';
  $pge=$_SERVER['SCRIPT_FILENAME'];
  $pge=explode("/",$pge);
  $pge=end($pge);

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
 
 
   if(! $conn ) {
    die("Je ne peux pas connecté à : ".$dbhost );
   }
 
 
   mysql_select_db($db,$conn) or die("db selection failed");
   //echo $_SESSION['id_user'];

   if(!isset($_SESSION['id_user']) && $pge!='index.php')
   {
   	   header("location:index.php");
   }
?>