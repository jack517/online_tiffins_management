<?php
require_once"connect.php";
session_start();
$username=$_SESSION['Name'];//.$_SESSION['last_name'];
$name=$_SESSION['name'];//tiffinwala

$useraddress="select * from userprivateinfo where Name='$username'";
$userrun=$connection->query($useraddress);
$row=$userrun->fetch_assoc();
$add=$row['address'];


$id=$_SESSION['hashkey'];
if(empty($id)){
echo "Tiffin address Not found";
}
else{


$time=date("Y-m-d");

if(isset($_POST['confirm'])&&isset($_POST['pack'])){
	require_once"confirm.php";

	$pack=$_POST['pack'];
if(empty($_POST['shippingaddress'])){
	$ship=$add;

}
else{
	$ship=$_POST['shippingaddress'];
}

	$status=1;

$order="INSERT INTO user(username,ordertiffin,status,startdate,hashtifin,shippingaddress,pack) values('$username','$name' ,'$status','$time','$id','$ship','$pack')";
$orderrun=$connection->query($order) ;
if($orderrun==TRUE){
	$tiffinwala="select ordertiffin,shippingaddress,username,tiffincenter.number,status,userprivateinfo.usernumber from user,tiffincenter,userprivateinfo where user.hashtifin=tiffincenter.hashid and status=1";
$run=$connection->query($tiffinwala);
$result=$run->fetch_assoc();
$deladdress=$result['shippingaddress'];
$customer=$result['username'];
 $tiffinwalanumber=$result['number'];
$usernumber=$result['usernumber'];
require_once "run.php";

header("location:list1.php?hash=$id &success=1");
//echo $_SESSION['msg'];

}
else{
echo $connection->error;
}
}
}

?>