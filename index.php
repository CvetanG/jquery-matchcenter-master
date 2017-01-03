<html>

<head>
    <title>Start Up Line</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/matchcenter.css" media="screen,projection" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.matchcenter.js"></script>
    <script type="text/javascript" src="js/ajaxGetPost.js"></script>
    <script>
    // var Players = new Array();
    // // var Players = [];
    // // Players['Nr'] = new Array();
    // Players['id']=  new Array (1,2,3,4,5,6,7,8,9,10,11,12,13,14);
    // Players['nr']= new Array (22, 9, 11,3,5,7,16,8,6,69,23,2,1,14);
    // Players['name']=new Array ('Миро', 'Боби','Денис','Бисер', 'Бобо', 'Сашо', 'Ангел', 'Цецо', 'Боян Тр.', 'Динко', 'Вени', 'Магунски', 'Илия', 'Стоян');


    // $(document).ready(function(){
    // var i;
    // for (i = 0; i < 14; ++i) {
    //       // $.each(Players , function(value) {
    //         $("#tog-" + Players.id[i]).click(function(){
    //               if ($("#player-" + Players.nr[i]).length > 0) {
    //                    $("#player-" + Players.nr[i]).toggle();
    //               } else {
    //                    $('#matchfield').matchcenter("addPlayer", Players.id[i], Players.nr[i], Players.nr[i], Players.name[i], elementLeft, elementTop);
    //               }
    //         });
    //      }
    //      // });
    // });



    /*$(document).ready(function(){

        $("#tog-1").click(function(){
              if ($("#player-22").length > 0) {
                   $("#player-22").toggle();
              } else {
                   $('#matchfield').matchcenter("addPlayer", 1, 22, 22, "Miro", elementLeft, elementTop);
              }
        });
    });*/
    </script>
</head>

<body>
    <div id="pagewrap">
        <header>
            <table>
                <tr>
                <?php
     include ('./api/config.php');
        //Create a query to fetch our values from the database
        $get_match = mysqli_query($link,
            "SELECT B1.logo_link AS home, B2.logo_link AS away, DATE_FORMAT(A.match_day, \"%D %M %Y %W\") AS match_day, TIME_FORMAT(A.match_time, \"%H:%i\") AS match_time
            FROM match_day AS A
            INNER JOIN logoes AS B1
            ON A.logo_home_id=B1.logo_id
            INNER JOIN logoes AS B2
            ON A.logo_away_id=B2.logo_id
            WHERE A.match_id=1;"
            );
        //We then set variables from the * array that is fetched from the database
        while($row = mysqli_fetch_array($get_match)) {

            // $id= $row['pos'];
            $home = $row['home'];
            $away = $row['away'];
            $match_day = $row['match_day'];
            $match_time = $row['match_time'];

            $match = '<td> <img src="'.$home.'" width="270px"></td>';
            $match .= '<td> <h3>'.$match_day.' </h3> <h3>'.$match_time.' </h3></td>';
            $match .= '<td> <img src="'.$away.'" max height="90px"></td>';

            echo "$match";
        }
?>
                </tr>
            </table>
        </header>
        <br>
        <div id="content">
            <?php
     include ('./api/config.php');
        //Create a query to fetch our values from the database
        $get_player = mysqli_query($link, "SELECT * FROM players");
        //We then set variables from the * array that is fetched from the database
        while($row = mysqli_fetch_array($get_player)) {

            $id= $row['pos'];
            $nr = $row['nr'];
            $name = $row['name'];
            $link = $row['link'];
            $player = '<img src="'.$link.'" onclick="$(&#39#matchfield&#39).matchcenter(&#39onoffPlayer&#39, '.$id.', '.$nr.', &#39'.$name.'&#39);">';

            echo "$player";
        }
?>
            <!-- <img src="http://www.bamf-bg.eu/uploads/players/t_1477403936__mg_8858.jpg" onclick="onoffPlayer( 1, 22,  'Миро');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477403992__mg_8871.jpg" onclick="onoffPlayer( 2, 9, 'Боби');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404015__mg_8859.jpg" onclick="onoffPlayer( 3, 11, 'Денис');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404041__mg_8852.jpg" onclick="onoffPlayer( 4, 3, 'Бисер');">
            <img src="./img/bobo.jpg" onclick="onoffPlayer( 5,  5, 'Бобо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404116__mg_8864.jpg" onclick="onoffPlayer( 6, 7, 'Сашо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404147__mg_8855.jpg" onclick="onoffPlayer( 7, 16, 'Ангел');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404272__mg_8880.jpg" onclick="onoffPlayer( 8, 8, 'Цецо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404163__mg_8876.jpg" onclick="onoffPlayer( 9, 6, 'Боян Т');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404358__mg_8877.jpg" onclick="onoffPlayer( 10, 69, 'Динко');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404194__mg_8874.jpg" onclick="onoffPlayer( 11, 23, 'Вени');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404217__mg_8869.jpg" onclick="onoffPlayer( 12, 2, 'Магунски');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404231__mg_8882.jpg" onclick="onoffPlayer( 13, 1, 'Илия');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404250__mg_8865.jpg" onclick="onoffPlayer( 14, 14, 'Стоян');"> -->
            <p>* click on your picture to Add or Remove yourself from the list with players for the next match</p>
        </div>
        <div id="middle">
            <h2>Who will play next match and Substitution</h2>
            <p id="bottom_possition">
                <input type="button" onclick="$('#matchfield').matchcenter('myReset');" value="Reset All Players" />
            </p>
        </div>
        <div id="matchfield">
            <?php
            // $a = 5;
            // echo "$a";
     include ('./api/config.php');
        //Create a query to fetch our values from the database
        $get_player = mysqli_query($link, "SELECT * FROM players");
        //We then set variables from the * array that is fetched from the database
        while($row = mysqli_fetch_array($get_player)) {

            $id= $row['pos'];
            $nr = $row['nr'];
            $name = $row['name'];
            $x = $row['cur_x'];
            $y = $row['cur_y'];
            $d = $row['display'];
            //then echo our div element with CSS properties to set the left(x) and top(y) values of the element
             $player = '<div id="player-'.$nr.'" class="player cf" style="left: '.$x. 'px; top: '.$y.'px; display:'.$d.'">';
                    $player .= '<div class="player-nr">'.$nr.'</div>';
                    $player .= '<div class="player-name">'.$name;
                    $player .= '<div class="dropdown-content">';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 20, &#39GK&#39, 200 );">GK</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 21, &#39LB&#39,  201 );">LB</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 22, &#39RB&#39, 202 );">RB</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 23, &#39CM&#39, 203 );">CM</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 24, &#39LW&#39, 204 );">LW</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr.', 25, &#39RW&#39, 205 );">RW</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39myDefaultPos&#39, '.$nr.',' .$id.');">default</a>';
                     // $player .='<a href="#" onclick="$(&#39#player-'.$nr.'&#39).remove();">Remove</a>';
                     $player .='</div>';
                    $player .='</div>';
                    $player .='</div>';
            echo "$player";

        }
?>

        </div>
        <div id="sidebar">
          <p >
               <input type="button" onclick="$('#matchfield').matchcenter('AllDefaultPos');" value="Reset All Positions" />
          </p>
     </div>
        <footer>
            <h4>Footer</h4>
            <p>
                Footer text
            </p>
        </footer>
    </div>
    <script type="text/javascript">

        var matchcenter = $('#matchfield').matchcenter({
            system: 'Reset'
        });

    // function setPositions(){
    //      $('#matchfield').matchcenter("addPlayer", 20, 200, 0, "GK", elementLeft, elementTop);
    //      $('#matchfield').matchcenter("addPlayer", 21, 201, 0, "LB", elementLeft, elementTop);
    //      $('#matchfield').matchcenter("addPlayer", 22, 202, 0, "RB", elementLeft, elementTop);
    //      $('#matchfield').matchcenter("addPlayer", 23, 203, 0, "CM", elementLeft, elementTop);
    //      $('#matchfield').matchcenter("addPlayer", 24, 204, 0, "LW", elementLeft, elementTop);
    //      $('#matchfield').matchcenter("addPlayer", 25, 205, 0, "RW", elementLeft, elementTop);
    // };

    // setPositions();
    // $('#matchfield').matchcenter("addPlayer", 5, 105, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 6, 106, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 7, 107, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 8, 108, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 9, 109,  0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 10, 110, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 11, 111, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 12, 112, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 13, 113, 0, "", elementLeft, elementTop);
    // $('#matchfield').matchcenter("addPlayer", 14, 114, 0, "", elementLeft, elementTop);

    </script>
</body>

</html>
