<?php
// Make sure an ID was passed
if(isset($_GET['q'])) {
    $id = $_GET['q']; // Get the ID
    $con=mysqli_connect("127.0.0.1","root","","GS");
    if(mysqli_connect_errno()) {
        die("MySQL connection failed: ". mysqli_connect_error());
    }
    // Fetch the file information
    $query = "SELECT mime, name, size, data FROM photos WHERE id = '{$id}'";
    $result = mysqli_query($con,$query);
    if($result) {
        // Make sure the result is valid
        if($result->num_rows == 1) {
            // Get the row
            $row = mysqli_fetch_assoc($result);
            // Print headers
            header("Content-Type: ". $row['mime']);
            //header("Content-Length: ". $row['size']);
            //header("Content-Disposition: attachment; filename=". $row['name']);
            // Print data
            echo $row['data'];
        }
        else {
            echo 'Error! No image exists with that ID.';
        }
        mysqli_free_result($result); // Free the mysqli resources
    }
    else  echo "Error: " .mysqli_error($con);
    mysqli_close($con);
}
else {
    echo 'Error! No ID was passed.';
}
?>