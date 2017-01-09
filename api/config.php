<?php
/*Database Settings*/

$db_host ="localhost"; //this will likely stay the same
$db_name = "players"; //name of the database we will be using
$db_usr = "sid"; //db username
$db_pass = "123456"; //db password

//Connect to the database
// $link = mysqli_connect($db_host, $db_usr, $db_pass) or die("MySQL Error: " . mysqli_error());
//Select our database
// mysqli_select_db($link, $db_name) or die("MySQL Error: " . mysqli_error());


$link = mysqli_connect($db_host, $db_usr, $db_pass, $db_name) or die("MySQL Error: " . mysqli_error());

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

?>