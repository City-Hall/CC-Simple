“config.php”	<?php
/* Database credentials. */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'calvarea1');
define('DB_PASSWORD', 'ys9rv4');
define('DB_NAME', 'calvarea1_db');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

