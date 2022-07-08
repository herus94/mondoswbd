
<?php

$con = mysqli_connect("localhost", "root", "", "mondoswbd");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>