// function createXmlhttp() {
//         if (window.XMLHttpRequest) {
//             // code for IE7+, Firefox, Chrome, Opera, Safari
//             xmlhttp = new XMLHttpRequest();
//         } else {
//             // code for IE6, IE5
//             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//         };
//       return xmlhttp;
// }


// xmlhttp.open("GET","getuser.php?q="+str,true);
//         xmlhttp.send();

//$app->put('player/pos/:nr/:pos', 'updatePos');
function updatePos(nr, pos) {
    // xmlhttp = createXmlhttp;
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        };
    xmlhttp.open("PUT","./api/serv_updatePos.php?nr="+nr+";&pos="+pos, true);
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

function formToJSON() {
    return JSON.stringify({
        "pos": $('#pos').val(),
        "nr": $('#nr').val(),
        "name": $('#name').val(),
        "link": $('#link').val(),
        "def_x": $('#def_x').val(),
        "def_y": $('#def_y').val(),
        "cur_x": $('#cur_x').val(),
        "cur_y": $('#cur_yn').val(),
        "display": $('#display').val()
        });
}