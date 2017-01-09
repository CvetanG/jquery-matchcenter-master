<?php

require './config.php';
require './index.php';

$nr = ($_GET['nr']);

$def_x = get_DefCoord('x', $nr);
$def_y = get_DefCoord('y', $nr);

$sql = "UPDATE players SET cur_x= '".$def_x."', cur_y= '".$def_y."' WHERE nr='".$nr."'";
mysqli_query($link, $sql);
mysqli_close($link);


?>