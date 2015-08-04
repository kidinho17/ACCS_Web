<?php
require_once("Scripts/connect.php");
if(isset($_COOKIE["uname"])){
    setcookie("uname", "", time()- 60, "/","", 0);
    mysqli_close($conn);
}
$server = $_SERVER['SERVER_NAME'];
header('Location: http://'.$server.'/GeekStars/');
?>