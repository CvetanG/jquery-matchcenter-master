var xmlhttp;
$(document).ready(function(){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        };
    });

function updatePos(nr, pos) {
    
    xmlhttp.open("POST","api/serv_updatePos.php?nr="+nr+"&pos="+pos, true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}

// $app->put('player/block/:nr', 'updatePlayerBlock');
function updatePlayerBlock(nr) {

    xmlhttp.open("POST","api/serv_updatePlayerBlock.php?nr="+nr, true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}

// $app->put('player/default/:nr', 'updateOnePosDefault');
function updateOnePosDefault(nr) {
    
    xmlhttp.open("POST","api/serv_updateOnePosDefault.php?nr="+nr, true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}

// $app->put('players/default', 'setAllPosDefault');
function updateAllPosDefault() {

    xmlhttp.open("POST","api/serv_setAllPosDefault.php", true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}

// $app->put('players/reset', 'resetPositions');
function resetPositions() {

    xmlhttp.open("POST","api/serv_resetAllPositions.php", true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}