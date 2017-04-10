<?php
include "connect.php";
session_start();
$useremail=$_SESSION['email'];
$hash=$_SESSION['hashkey'];
if (isset($_POST['rate']) && !empty($_POST['rate'])) {

    $rate = $conn->real_escape_string($_POST['rate']);
// check if user has already rated
    $sql = "SELECT rating from  rating WHERE userfbid='$useremail';
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        echo $row['id'];
    } else {

        $sql = "UPDATE rating SET rating='$rate' where userfbid='useremail' and tiffincenterhash='$hash';
        if (mysqli_query($conn, $sql)) {
            echo "0ok;
        }
    }
}
$conn->close();
?>