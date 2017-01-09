<?php

require './config.php';
require './index.php';

$nr = ($_GET['nr']);

$get_cur_display = get_display($nr);

if ($get_cur_display === 'none') {
	$display = 'block';
} else if($get_cur_display === 'block'){
 	$display = 'none';
}
console_log($display);

$sql = "UPDATE players SET display= '".$display."' WHERE nr='".$nr."'";
mysqli_query($link, $sql);
mysqli_close($link);


?>