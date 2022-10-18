<?php
 
// second database connection	//  This are my database constants for bank pro

define("DB_SERVER","localhost");
define("DB_USER","buyscriptsdemo_margon");
define("DB_NAME","buyscriptsdemo_margon");
define("DB_PASS","2021money@L");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
if(!$conn){
  #echo "<h1>Server connection is successful!</h1><br>";
}
$db=mysqli_select_db($conn,DB_NAME);
 if(!$db){
   echo '<meta content=0.000001;wire-transfer.php http-equiv="refresh" />';
}

 
?>