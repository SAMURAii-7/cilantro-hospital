<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password, "hospital");
    if($con)
        echo "done"
?>