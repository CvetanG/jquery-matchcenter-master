Database: 'xycoords'

CREATE TABLE IF NOT EXISTS `coords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `x_pos` int(4) NOT NULL,
  `y_pos` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


<?php
/*Database Settings*/

$db_host ="localhost"; //this will likely stay the same
$db_name = "xycoords"; //name of the database we will be using
$db_usr = "database_username"; //db username
$db_pass = "database_password"; //db password

//Connect to the database
$link = mysqli_connect($db_host, $db_usr, $db_pass) or die("MySQL Error: " . mysqli_error());
//Select our database
mysqli_select_db($link, $db_name) or die("MySQL Error: " . mysqli_error());
?>

<?php
if(!$_POST["data"]){
    echo "Nothing Sent";
    exit;
}

include ('config.php');

//decode JSON data received from AJAX POST request
$data = json_decode($_POST["data"]);

foreach($data->coords as $item) {
    //Extract X number for panel
    $coord_X = preg_replace('/[^\d\s]/', '', $item->coordTop);
    //Extract Y number for panel
    $coord_Y = preg_replace('/[^\d\s]/', '', $item->coordLeft);
    //escape our values - as good practice
    $x_coord = mysqli_real_escape_string($link, $coord_X);
    $y_coord = mysqli_real_escape_string($link, $coord_Y);

    //Setup our Query
    $sql = "UPDATE coords SET x_pos = '$x_coord', y_pos = '$y_coord'";

    //Execute our Query
    mysqli_query($link, $sql) or die("Error updating Coords :".mysqli_error());
}

//Return Success
echo "success";

?>



<div id="glassbox">
<?php
        //Create a query to fetch our values from the database
        $get_coords = mysqli_query($link, "SELECT * FROM coords");
        //We then set variables from the * array that is fetched from the database
        while($row = mysqli_fetch_array($get_coords)) {
            $x = $row['x_pos'];
            $y = $row['y_pos'];
            //then echo our div element with CSS properties to set the left(x) and top(y) values of the element
            echo '<div id="element" style="left:'.$x.'px; top:'.$y.'px;"><img src="nettuts.jpg" alt="Nettuts+" />Move the Box<p></p></div>';
        }
?>
</div>
<div id="respond"></div>