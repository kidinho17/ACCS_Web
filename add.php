<?php
    require_once("Scripts/connect.php");
    if(connected()){
        $t = $_GET['t'];
        $h = $_GET['h'];
        $l = $_GET['l'];
        $fs = $_GET['fs'];
        $time = $_GET['time'];

        //add to data db
        $sql= "INSERT INTO readings(temp,humidity,luminosity,fan_speed,time_workstation) VALUES ('".$t."','".$h."','".$l."','".$fs."','".$time."')";
        if(!mysqli_query($conn,$sql)) {
             die('Error: '.mysqli_error($conn));
        }
        echo "Added";
        mysqli_close($conn);
    }
?>