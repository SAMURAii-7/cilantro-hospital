<?php
    if(isset($_POST['name'])){
         $server = "sql104.epizy.com";
        $username = "epiz_31781526";
        $password = "VLw3IL2lUe66";
        $con = mysqli_connect($server, $username, $password, "epiz_31781526_hospital");
    
        if(!$con) {
            die("Connection to database failed due to".mysqli_connect_error());
        }

        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $doctor = $_POST['doctor'];
        $insert = '';

        $sql = "INSERT INTO `hospital`.`doctor` (`Name`, `Age`, `Email`, `Phone`, `Gender`, `Doctor`, `timestamp`) VALUES ('$name', '$age', '$email', '$phone', '$gender', '$doctor', current_timestamp());";
        if($con->query($sql)) {
            $insert = true;
        }
        else {
            $insert = false;
        }
        
        echo $insert;

        $con->close();
    }
?>