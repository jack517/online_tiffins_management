<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}?>
<?php
require_once 'fbConfig.php';
require_once 'User.php';
include "connect.php";
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.m1{
width:100%;
height:500px;
}
.m2{
height:500px;
}
.modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
</style>    </head>

   <body style="background-color: #bebdbd;">

<div class="container" style="width: 100%; max-width: 100%;">
     <nav class="navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <form class="navbar-form navbar-center">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
<span style="font-size:30px;cursor:pointer;float:right;color:white;margin-top:0px;" onclick="openNav()">&#9776;</span>

  </div>
</nav>
   <div id="overlay1">
<center>        <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

    <div class="carousel-inner">
    <div class="item active"> <img src="img/home-page-new-bck-1.jpg" style="width:120%" alt="First slide">
      </div>
    <div class="item"> <img src="img/home-page-new-bck-2.jpg" style="width:120%" data-src="" alt="Second    slide">
      </div>
    <div class="item"> <img src="img/home-page-new-bck-3.jpg" style="width:120%" data-src="" alt="Third slide">
      </div>
  
  </div></center>    
<div id="mySidenav" class="sidenav">

 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<?php if($fbUser){
	$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	
	$user = new User();
		//Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['data']['url'],
		'link' 			=> $fbUserProfile['link']
	);
$userData = $user->checkUser($fbUserData);
	
	//Put user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
	if(!empty($userData)){
$fbid=$userData['oauth_uid'];
$_SESSION['oauth_uid']=$fbid;

		$output1= $userData['picture'];
        $output2= $userData['first_name'].' '.$userData['last_name'];
$_SESSION['Name']=$output2;
        $output3=  $userData['email'];


}
?>

     <div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
          <img src="<?php echo $output1;?> "class="img img-circle" alt="" width="100">
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
             <?php echo $output3;?>
          </div>
          <div class="profile-usertitle-job">
          <?php echo $output2;?>
          </div>
        </div>
        <div class="profile-usermenu">
          <ul class="nav">
            <li>
              <a href="#"data-toggle="modal" data-target="#myModal">
              <i class="glyphicon glyphicon-user"></i> Edit Profile </a>
            </li>
  

            <li>
          <a href="#">
              <i class="glyphicon glyphicon-time"></i>Transaction History </a>
            </li>
            <li>
              <a href="list.php">
              <i class="glyphicon glyphicon-calendar"></i>Check Attendence </a>
            </li>
 <li>
              <a href="#"> <i class="glyphicon glyphicon-shopping-cart"></i>Add New order</a>
            </li>

            <li>
              <a href="logout.php"> <i class="glyphicon glyphicon-off"></i>Logout </a>
            </li>
              <li>
              <a href="#"> <i class="glyphicon glyphicon-envelope"></i>Mail us </a>
            </li>
          
          </ul>
        </div>
      </div>
     </div>
</div>
</div>
<?php }
else{
$fbUser = NULL;
	$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
	$output = '<a href="'.$loginURL.'"><img src="images/f.jpg" height="50"></a>'; 
?>

<a href="#" data-toggle="modal" data-target="#myModal1">Login/Signup</a>

  <a href="#" data-toggle="modal" data-target="#myModal">Aboutus</a>
  <a href="#">Terms & Policy</a>
  <a href="#">Contact</a>

<?php }?>




  </div>
</div>
</div>
<?php
$query = "select * from tiffincenter";

$result = $connection->query($query);
if($result->num_rows>0){
     while($row = $result->fetch_assoc()) {

   $hashkey=$row['hashid'];
?>


<div class="container"style="width:50%;height:300px;margin-top:0px; padding:0px;background:alice white; margin-left:10px;">
<img src="images/tiffin.jpeg" width="200" height="200">
<div class="alert alert-success" style="width:auto; height:200px; margin-left:210px;margin-top:-200px;">
<label style="font-size:28px; font-width:100px; margin-left:30px;"><?php echo $row['name'];?> </label>
<label style="color:red; margin-left:20px;font-size:16px;"><?php echo $row['address'];?></label>
<br><br>
<label style="font-color:pink; font-size:16px;margin-left:10px;">Price:</label><h5 style="margin-top:-25px;margin-left:70px;">2400 (sunday off)</h5>
<a href="list1.php?hash=<?php echo $hashkey;?>"/><button type="button" class="btn btn-default btn-lg"style="margin-top:0px;margin-left:30px;">View Profile</button></a>


</div>
</div>
</div>
<?php }}
?>
<script>
$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
$('.dropdown-button').dropdown('open');
$('.dropdown-button').dropdown('close');

</script>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog m1">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit Details</h4>
        </div>
        <div class="modal-body m2" style="padding:40px 50px;">
 <form role="form-horizontal" method="post" action="changeaddress.php">
            <div class="form-group form-group-lg">
<div class="col-sm-8">
                    <label for="address"><span class="glyphicon glyphicon-edit"></span> Change delivery address</label>


<?php  if(isset($_GET['sucess'])){
echo '<label>msg</label>';
 }?>

                   <input type="text" class="form-control" name="newaddress" placeholder="Enter New Delivaery address">
            </div></div>
<br>
<button type="submit"  name="submit' class="btn btn-default"><span class="glyphicon glyphicon-right"></span> Save New Address</button>
          </form>
<br><br>
<form role="form">
            <div class="form-group">
<div class="col-sm-6">

              <label for="psw"><span class="glyphicon glyphicon-edit"></span>Change Mobile No</label>

              <input type="text" class="form-control" name="oldno" placeholder="Enter old Number">
<br>

              <input type="text" class="form-control" name="newno" placeholder="Enter New Number">
</div>
            </div>
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-right"></span> Save New Number</button>
          </form>

<!--tiffin details-->
<label for="psw"><span class="glyphicon glyphicon-edit"></span>Tiffin Details</label>

<div class="panel panel-default">
    <div class="panel-body">
<label for="psw">Your Tiffin Center:</label><br>
<label for="psw">Starting Date:</label><br>
<label for="psw">Tiffin's owner name:</label><br>
<label for="psw">Address:</label><br>

</div>
  </div>

<!-- end tiififn-->
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-cross"></span>Cancel My Order</button>

                      </div>
        </div>
      
    </div>
  </div> 
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registration</h4>
        </div>
        <div class="modal-body">
       <div><center><?php echo $output?></center></div>  
</div>
      </div>
      </div>
    </div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</body>
</html>


<?php
if(isset($_POST['address'])&& isset($_POST['number'])){

  $address = test_input($_POST['address']);
 $phone =test_input($_POST['number']);
if(empty($name)){
  $query = "INSERT INTO userprivateinfo values "."('$output2','$address','$phone')";

  $result = $connection->query($query);
if($result){
echo '<script>alert("ThankYOU!!");</script>';
}
else{
echo mysql_error();
}
}
}
?>