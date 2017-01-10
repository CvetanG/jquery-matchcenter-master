<?php
my_count();

function my_count() {
    // global $count;
    include ('./config.php');
    $sql = "SELECT COUNT(display) FROM players WHERE display='block';";
    $rs = mysqli_query($link, $sql);
    $count = mysqli_fetch_array($rs)[0];
    echo 'Total Players: '.$count;
}
?>