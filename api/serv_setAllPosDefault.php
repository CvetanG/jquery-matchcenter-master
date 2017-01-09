<?php

require './config.php';
require './index.php';

$playerNrs = get_playersNr();
for ($i = 0; $i < count($playerNrs); $i++) {
	$cur_nr = $playerNrs[$i][0];
	console_log($cur_x);
	$def_x = get_DefCoord('x', $cur_nr);
	$def_y = get_DefCoord('y', $cur_nr);

	$sql = "UPDATE players SET cur_x='".$def_x."', cur_y='".$def_y."' WHERE nr='".$cur_nr."'";

	mysqli_query($link, $sql);
}
mysqli_close($link);


?>