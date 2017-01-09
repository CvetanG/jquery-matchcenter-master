<?php

require './config.php';
require './index.php';

$nr = ($_GET['nr']);
$pos = ($_GET['pos']);

$cur_x = get_coordPos('x', $pos);
// console_log($cur_x);
$cur_y = get_coordPos('y', $pos);
// console_log($cur_y);

$sql = "UPDATE players SET cur_x= '".$cur_x."', cur_y= '".$cur_y."' WHERE nr='".$nr."'";
mysqli_query($link, $sql);
mysqli_close($link);


?>