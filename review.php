<?php
include "connect.php";
session_start();
$fbid=$_SESSION['oauth_uid'];
$id=$_SESSION['hashkey'];
?>
<?php
if(isset($_POST['review'])&&isset($_POST['subt'])){
$review=$_POST['review'];

$reviewquery="INSERT INTO rating values"."('$fbid','$review','$id')";
$run1=$connection->query($reviewquery);
if($run1==False)

{
echo $connection->error;

}}
$connection->close();
?>