<html>

<head>
    <title>Start Up Line</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="./css/matchcenter.css" media="screen,projection" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.matchcenter.js"></script>
    <script type="text/javascript" src="./js/ajaxGetPost.js"></script>
    <script>
    </script>
</head>

<body>
    <div id="pagewrap">
        <header>
            <table>
                <tr>
                    <!-- inserting logoes and Date from DB -->
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
            <!-- inserting images from DB -->
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
            <p>* click on your picture to Add or Remove yourself from the list with players for the next match</p>
        </div>
        <div id="middle">
            <h2>Who will play next match and Substitution</h2>
            <p id="bottom_possition">
                <input type="button" onclick="$('#matchfield').matchcenter('myReset');" value="Reset All Players" />
            </p>
        </div>
        <div id="matchfield">
            <!-- inserting drop down menu -->
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
            <!-- <h4>Footer</h4>
            <p>
                Footer text
            </p> -->
        </footer>
    </div>
    <script type="text/javascript">

        var matchcenter = $('#matchfield').matchcenter({
            system: 'Reset'
        });

    </script>
</body>

</html>
