<?php

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

function get_playersNr() {

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