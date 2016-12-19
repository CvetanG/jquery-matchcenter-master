<html>

<head>
    <title>Start Up Line</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/matchcenter.css" media="screen,projection" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.matchcenter.js"></script>
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
                    <td>
                        <img src="./img/Minerva-Logo.png" width="270px">
                    </td>
                    <td>
                        <h3>21  Март 2017 (втoрник) </h3>
                        <h3>18:45h</h3>
                    </td>
                    <td>
                        <img src="./img/logo.png" max height="90px">
                    </td>
                </tr>
            </table>
        </header>
        <br>
        <div id="content">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477403936__mg_8858.jpg" onclick="onoffPlayer( 1, 22,  'Миро');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477403992__mg_8871.jpg" onclick="onoffPlayer( 2, 9, 'Боби');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404015__mg_8859.jpg" onclick="onoffPlayer( 3,11, 'Денис');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404041__mg_8852.jpg" onclick="onoffPlayer( 4,3, 'Бисер');">
            <img src="./img/bobo.jpg" onclick="onoffPlayer( 5,  5, 'Бобо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404116__mg_8864.jpg" onclick="onoffPlayer( 6, 7, 'Сашо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404147__mg_8855.jpg" onclick="onoffPlayer( 7,  16, 'Ангел');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404272__mg_8880.jpg" onclick="onoffPlayer( 8,  8, 'Цецо');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404163__mg_8876.jpg" onclick="onoffPlayer( 9, 6, 'Боян Т');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404358__mg_8877.jpg" onclick="onoffPlayer( 10, 69, 'Динко');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404194__mg_8874.jpg" onclick="onoffPlayer( 11,23, 'Вени');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404217__mg_8869.jpg" onclick="onoffPlayer( 12, 2, 'Магунски');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404231__mg_8882.jpg" onclick="onoffPlayer( 13, 1, 'Илия');">
            <img src="http://www.bamf-bg.eu/uploads/players/t_1477404250__mg_8865.jpg" onclick="onoffPlayer( 14,14, 'Стоян');">
            <p>* click on your picture to Add or Remove yourself from the list with players for the next match</p>
        </div>
        <div id="middle">
            <h2>Who will play next match and Substitution</h2>
            <p id="bottom_possition">
                <input type="button" onclick="myReset();" value="Remove All Players" />
            </p>
        </div>
        <div id="matchfield">
            <?php

     $a = '5';
     echo '<p>'.$a.'</p>';
     include ('config.php');
        //Create a query to fetch our values from the database
        $get_data = mysqli_query($link, "SELECT * FROM player");
        //We then set variables from the * array that is fetched from the database
        while($row = mysqli_fetch_array($get_player)) {

            $id= $row['pos'];
            $nr = $row['nr'];
            $name = $row['name'];
            $x = $row['x_pos'];
            $y = $row['y_pos'];
            $d = $row['display'];
            //then echo our div element with CSS properties to set the left(x) and top(y) values of the element
             $player = '<div id="player-' . $id . ' " class="player cf" style="left: ' .$x. 'px; top: ' .$y . 'px;">';
                    $player .= '<div class="player-nr">' .$nr . '</div><div class="player-name">' . $name ;
                    $player .= '<div class="dropdown-content">';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, ' .$nr .', 20, 200, elementLeft, elementTop );">GK</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, ' .$nr .', 21, 201, elementLeft, elementTop );">LB</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, ' .$nr. ', 22, 202, elementLeft, elementTop );">RB</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, ' .$nr .', 23, 203, elementLeft, elementTop );">CM</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, ' .$nr.', 24, 204, elementLeft, elementTop );">LW</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39mySubstitutePlayer&#39, '.$nr. ', 25, 205, elementLeft, elementTop );">RW</a>';
                    $player .='<a href="#" onclick="$(&#39#matchfield&#39).matchcenter(&#39myDefaultPos&#39, ' .$nr.',' .$id. ',  elementLeft, elementTop );">default</a>';
                     $player .='<a href="#" onclick="$(&#39#player-' .$nr .'&#39).remove();">Remove</a>';
                     $player .='</div>';
                    $player .='</div>';
            echo '$player';
        }
?>
        </div>
        <!-- <div id="sidebar">
          <p >
               <input type="button" onclick="resetPositions();" value="Reset Positions" />
          </p>
     </div> -->
        <footer>
            <h4>Footer</h4>
            <p>
                Footer text
            </p>
        </footer>
    </div>
    <script type="text/javascript">
    var element = document.getElementById('pagewrap'); //replace elementId with your element's Id.
    var rect = element.getBoundingClientRect();
    var elementLeft, elementTop; //x and y
    var scrollTop = document.documentElement.scrollTop ?
        document.documentElement.scrollTop : document.body.scrollTop;
    var scrollLeft = document.documentElement.scrollLeft ?
        document.documentElement.scrollLeft : document.body.scrollLeft;
    var elementTop = rect.top + scrollTop + 140;
    var elementLeft = rect.left + scrollLeft + 373;

    function onoffPlayer(id, nr, name) {
        if ($("#player-" + nr).length > 0) {
            $("#player-" + nr).toggle();
        } else {
            $('#matchfield').matchcenter("addPlayer", id, nr, nr, name, elementLeft, elementTop);
        }
    };

    function myReset() {
        var $this = $(this),
            data = $this.data('matchcenter');
        for (var i = 0; i < 100; i++) {
            $('#player-' + i).remove();
        }
    };

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

    /*$(document).ready(function() {
            $("#player-8").draggable({
                    containment: '#glassbox',
                    scroll: false
             }).mousemove(function(){
                    var coord = $(this).position();
                    $("p:last").text( "left: " + coord.left + ", top: " + coord.top );
             }).mouseup(function(){
                    var coords=[];
                    var coord = $(this).position();
                    var item={ coordTop:  coord.left, coordLeft: coord.top  };
                    coords.push(item);
                    var order = { coords: coords };
                    $.post('updatecoords.php', 'data='+$.toJSON(order), function(response){
                            if(response=="success")
                                $("#respond").html('<div class="success">X and Y Coordinates Saved!</div>').hide().fadeIn(1000);
                                setTimeout(function(){ $('#respond').fadeOut(1000); }, 2000);
                            });
                    });

            });*/
    </script>
</body>

</html>
