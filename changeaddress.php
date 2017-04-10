<?php
session_start();
$output2=$_SESSION['Name'];
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_database="fb";
$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);

if($connection->connect_error) die($connection->connect_error);

?>
<?php
if(isset($_POST['newaddress'])){
$newaddress=$_POST['newaddress'];
$sql1="UPDATE userprivateinfo SET address='$newaddress' WHERE Name='$output2'";
$run=$connection->query($sql1);
if($run){
$msg='Delivary has succesfully changed';
header("location:first.php?sucess");}
else{
echo mysql_error();
}
}
?>