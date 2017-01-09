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
    var my_method =updatePos;
    // xmlhttp.open("GET","api/serv_updatePos.php?nr="+nr+"&pos="+pos, true);
    xmlhttp.open("POST", "api/index.php?method="+my_method+"&nr="+nr+"&pos="+pos, true);
    xmlhttp.send();

    if (xmlhttp.status === 200) {
      alert(xmlhttp.responseText);
    }
}

// $app->put('player/block/:nr', 'updatePlayerBlock');
function updatePlayerBlock(nr) {
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        // url: rootURL + 'player/block/' + $('#nr').val(),
        url: rootURL + 'player/block/' + nr,
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Player Status updated successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updatePlayerBlock error: ' + textStatus);
        }
    });
}

// $app->put('player/default/:nr', 'updateOnePosDefault');
function updateOnePosDefault(nr) {
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        // url: rootURL + 'player/default/' + $('#nr').val(),
        url: rootURL + 'player/default/' + nr,
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Default Player position set successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updateOnePosDefault error: ' + textStatus);
        }
    });
}

// $app->put('players/default', 'setAllPosDefault');
function updateAllPosDefault() {
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: rootURL + 'players/default',
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Reset All Position successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('updateAllPosDefault error: ' + textStatus);
        }
    });
}

// $app->put('players/reset', 'resetPositions');
function resetPositions() {
    $.ajax({
        type: 'PUT',
        contentType: 'application/json',
        url: rootURL + 'players/reset',
        dataType: "json",
        data: formToJSON(),
        success: function(data, textStatus, jqXHR){
            alert('Reset All Players successfully');
        },
        error: function(jqXHR, textStatus, errorThrown){
            alert('resetPositions error: ' + textStatus);
        }
    });
}