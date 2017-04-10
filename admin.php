<?php
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_database="fb";
$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);
if($connection->connect_error) die($connection->connect_error);

if(isset($_POST['delete']) && isset($_POST['phone'])){
  $phone = get_post($connection,'phone');
  $query = "DELETE from tffincenter where number = '$phone'";
  $result = $connection->query($query);
}

if(isset($_POST['name']) && isset($_POST['addr']) && isset($_POST['phone'])){

  $name = ucfirst(strtolower(get_post($connection,'name')));
  $addr = ucfirst(strtolower(get_post($connection,'addr')));
  $phone = get_post($connection,'phone');
$hash=rand();

  $query = "INSERT INTO tiffincenter values "."('','$name','$addr','$phone','$hash')";
  $result = $connection->query($query);

}



function get_post($connection,$var){
  return $connection->real_escape_string($_POST[$var]);
}

 ?>



<html>
<head title="TiffinAdmin">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
</head>
<body>
<div class="container">
<h3><ul>TiffinAdmin</ul></h3>
<form action="admin.php" method="post"><pre>
Name     <input type="text" name="name">
Address  <input type="text" name="addr">
Phone    <input type="text" name="phone">
<button class="waves-effect waves-light btn-large" type="submit" >Add User
<i class="material-icons right">send</i>
</button>
<hr>
</pre></form>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</body>
</html>

