<?php

require './config.php';
require './index.php';

$nr = ($_GET['nr']);

$get_cur_injured = get_injured($nr);

if ($get_cur_injured === 'none') {
	$injured = 'inline';
	$display = 'none';

     $sql = "UPDATE players SET injured= '".$injured."', display= '".$display."' WHERE nr='".$nr."'";

} else if ($get_cur_injured === 'inline'){
 	$injured = 'none';

 	$sql = "UPDATE players SET injured= '".$injured."' WHERE nr='".$nr."'";
}

mysqli_query($link, $sql);
mysqli_close($link);


?>