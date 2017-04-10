<?php
include"connect.php";
session_start();
$customer=$_SESSION['Name'];

if(isset($_POST['orders']) && isset($_POST['orderid'])){
  $id = $_POST['orderid'];
  $time=date("Y-m-d");
  $stat=0;
  $query = "UPDATE user set status ='$stat',enddate = '$time' where  orderid='$id'";
  $result = $connection->query($query);

if($result==TRUE){
	header("location:orderhistory.php");

}
}
?>