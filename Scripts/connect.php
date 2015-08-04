<?php
    // Check connection
    $conn = mysqli_connect("127.0.0.1","root","","accs");
    function connected(){
        $connect_message = true;
        if (mysqli_connect_errno()) {
            $connect_message = false;
            //= "Failed to connect to Server: ". mysqli_connect_error();
        }
        return $connect_message;
    }
?>