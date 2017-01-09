<?php

// change def position to the constant player
function updatePos($nr, $pos) {
    require './config.php';
    require './index.php';

    $nr = ($_GET['nr']);
    $pos = ($_GET['pos']);

    $cur_x = get_coordPos('x', $pos);
    $cur_y = get_coordPos('y', $pos);

    $sql = "UPDATE players SET cur_x= '".$cur_x."', cur_y= '".$cur_y."' WHERE nr='".$nr."'";
    mysqli_query($link, $sql);
    mysqli_close($link);
}


// update player block to be none
function updatePlayerBlock($nr) {
    $request = Slim::getInstance()->request();
    $body = $request->getBody();
    $player = json_decode($body);
    $sql = "UPDATE players SET display=:display WHERE nr=:nr";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
	   $get_cur_display = get_display($nr);

	   if ($get_cur_display === 'none') {
	   	$display = 'block';
	   } else if($get_cur_display === 'block'){
	   	$display = 'none';
	   }
        $stmt->bindParam("display", $display);
        $stmt->bindParam("nr", $nr);
	   $stmt->execute();
        $db = null;
        echo json_encode($player);
        } catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

// update player pos to default
function updateOnePosDefault($nr) {
    $request = Slim::getInstance()->request();
    $body = $request->getBody();
    $player = json_decode($body);

    $sql = "UPDATE players SET cur_x=:cur_x, cur_y=:cur_y WHERE nr=:nr";

    	try {
      	$db = getConnection();;
      	$stmt = $db->prepare($sql);

		$get_x_pos = get_DefCoord('x', $nr);
     	$get_y_pos = get_DefCoord('y', $nr);

      	$stmt->bindParam("cur_x", $get_x_pos);
     	$stmt->bindParam("cur_y", $get_y_pos);
      	$stmt->bindParam("nr", $nr);
		$stmt->execute();
     	$db = null;
     	echo json_encode($player);
        } catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


// set all position to default
function setAllPosDefault() {
    // $request = Slim::getInstance()->request();
    // $body = $request->getBody();
    // $player = json_decode($body);
    // $sql = "UPDATE players SET cur_x=:cur_x, cur_y=:cur_y WHERE nr=:nr";

    // try {
    //     	$db = getConnection();
    //     	$stmt = $db->prepare($sql);

        	$players = get_players();
        	for ($x = 0; $x < count($players); $x++) {
     		$my_nr = $players[$x][0];
     		// echo $my_nr;
     		updateOnePosDefault($my_nr);
       //  		$get_x_pos = get_DefCoord('x', $my_nr);
     		// $get_y_pos = get_DefCoord('y', $my_nr);
	      // 	$stmt->bindParam("cur_x", $get_x_pos);
	     	// $stmt->bindParam("cur_y", $get_y_pos);
	     	// $stmt->bindParam("nr", $my_nr);
	     	// $stmt->execute();
	     	}
  //       	$db = null;
  //       	echo json_encode($player);
  //       } catch(PDOException $e) {
	 //    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		// echo '{"error":{"text":'. $e->getMessage() .'}}';
		// }
}

// set all position to default and all players block to none
function resetPositions() {

	$request = Slim::getInstance()->request();
    $body = $request->getBody();
    $player = json_decode($body);

    $sql = "UPDATE players SET cur_x=:cur_x, cur_y=:cur_y, display=:display WHERE nr=:nr";
    try {
        $db = getConnection();;
        $stmt = $db->prepare($sql);
        $display = 'none';

        $players = get_players();
        		// foreach ($players as &$value) {
        	for ($x = 0; $x < count($players); $x++) {
        			// updateOnePosDefault(intval($players[$x]));
     			$my_nr = $players[$x][0];
     			echo $my_nr;
        			$get_x_pos = get_DefCoord('x', $my_nr);
     			$get_y_pos = get_DefCoord('y', $my_nr);

	      		$stmt->bindParam(":cur_x", $get_x_pos);
	     		$stmt->bindParam(":cur_y", $get_y_pos);
	     		$stmt->bindParam(":display", $display);
	     		$stmt->bindParam(":nr", $my_nr);
	     		$stmt->execute();
	     	}
        $db = null;
        echo json_encode($players);
        } catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function get_coordPos($coord, $pos) {
    echo 'pos = '. json_encode($pos);
	if ($coord === 'x') {
	   $def_pos = 'def_x';
	} else if ($coord === 'y') {
		$def_pos = 'def_y';
	}

    $sql = "SELECT ".$def_pos." FROM positions where pos=:pos";

	try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam('pos', $pos);
        echo 'statement = '. json_encode($stmt);
        $stmt->execute();
        $pos = $stmt->fetchColumn(0);
        $db = null;
         // echo $pos;
        echo 'position = '. json_encode($pos);
        return $pos;
    } catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function get_DefCoord($coord, $nr) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$player = json_decode($body);

		if ($coord === 'x') {
			$def_pos = 'def_x';
		} else if ($coord === 'y') {
			$def_pos = 'def_y';
		}

     $sql = "SELECT ".$def_pos." FROM players where nr=:nr";

	try {
     	$db = getConnection();
    	$stmt = $db->prepare($sql);
     	$stmt->bindParam(":nr", $nr);
     	$stmt->execute();
     	$pos = $stmt->fetchColumn(0);
	     $db = null;
	     // echo $pos;
     	return $pos;
   	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function get_display($nr) {
	$sql = "SELECT display FROM players where nr=:nr";
	try {
     	$db = getConnection();
    		$stmt = $db->prepare($sql);
     	$stmt->bindParam(":nr", $nr);
     	$stmt->execute();
     	$pos = $stmt->fetchColumn(0);
	     $db = null;
     	return $pos;
   } catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function get_players() {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$player = json_decode($body);

     $sql = "SELECT nr FROM players";

	try {
     	$db = getConnection();
    		$stmt = $db->prepare($sql);     	$stmt->execute();
     	$players = $stmt->fetchAll(PDO::FETCH_NUM);
	     $db = null;
	     // print_r($players);
	     // print("\n");
     	return $players;
   	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

function getConnection() {
	require './config.php';
	$dbConnection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_usr, $db_pass);
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	return $dbConnection;
}

function console_log($data){
      // echo '<script>';
      echo 'console.log('. json_encode( $data ) .')';
      // echo '</script>';
    }

?>