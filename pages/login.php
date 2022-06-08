<?php
    if(isset($_POST['userName'])) {

        $server = "sql104.epizy.com";
        $username = "epiz_31781526";
        $password = "VLw3IL2lUe66";
        $con = mysqli_connect($server, $username, $password, "epiz_31781526_hospital");
    
        if(!$con) {
            die("Connection to database failed due to ".mysqli_connect_error());
        }
        $uName = $_POST['userName'];
        $pword = $_POST['password'];
        $pword = md5($pword);

        $sql = mysqli_query($con, "SELECT * FROM users WHERE username='$uName' AND password='$pword'");
        $num = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        $count = mysqli_num_rows($sql);
        if($count == 1) {
            session_start();
            $_SESSION['loggedIN'] = true;
            $_SESSION['name'] = $uName;
            echo "window.location.href='display.php'";
        }
        else {
            echo "die";
        }
    }
?>