<?php
require './config.php';
require './index.php';
// include_once('./index.php');

// $model = new Something_Model();

$nr = intval($_GET['nr']);
$pos = intval($_GET['pos']);

// $model->updatePos($nr, $pos);

$cur_x = get_coordPos('x', $pos);
$cur_y = get_coordPos('y', $pos);

// $sql="SELECT * FROM user WHERE id = '".$q."'";
$sql = "UPDATE players SET cur_x= '".$cur_x."', cur_y= '".$cur_y."' WHERE nr='".$nr."'";
mysqli_query($link, $sql);
mysqli_close($link);

?>