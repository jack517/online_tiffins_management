
<?php
//Include FB config file && User class
require_once 'fbConfig1.php';
require_once 'User.php';
require_once 'connect.php';
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}?>
<?php 
$id=$_GET['hash'];
$_SESSION['hashkey']=$id;
$query="select * from tiffincenter where hashid='$id'";
$result=$connection->query($query);
     $row = $result->fetch_assoc();
$name=$row['name'];
$_SESSION['name']=$name;
$address=$row['address'];
$contact=$row['number'];
?>
<?php
$query4="select * from users,rating where users.email=rating.userfbid";
$result4=$connection->query($query4);
     $row4= $result4->fetch_assoc();
$userimage=$row4['picture'];
$username= $row4['first_name'];
$_SESSION['first_name']=$username;
$useremail=$row4['email'];
$_SESSION['email']=$useremail;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic|Noto+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

<style>
@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

body{
background-image:url('img/menu-bac.jpg');
background-size:cover;
}
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
.column{
float:left;
width:20%;}
/* The Modal (background) */
.mfr {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top:120px;
left: 200px;
  top: 70px;
  width: 60%;
  height: 100%;
  overflow: auto;
  background-color: #111;
}

/* Modal Content */
.cont {
  position: relative;
  background-color: #111;
  left: 70px;
   width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
left:50px;
}


.demo {
  opacity: 0.6;
}
img {
  margin-bottom: -4px;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
           .rating { 
                border: none;
                float: left;
            }

            .rating > input { display: none; } 
            .rating > label:before { 
                margin: 5px;
                font-size: 1.75em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }

            .rating > .half:before { 
                content: "\f089";
                position: absolute;
            }

            .rating > label { 
                color: #ddd; 
                float: right; 
            }

            .rating > input:checked ~ label, 
            .rating:not(:checked) > label:hover,  
            .rating:not(:checked) > label:hover ~ label { color: red;  }

            .rating > input:checked + label:hover, 
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, 
            .rating > input:checked ~ label:hover ~ label { color: blue;  }     

 
 </head>
</style>
<body>
<?php
if(isset($_GET['success'])){
?>
<div class="alert alert-success"id="success-alert">Your order has been confirmed!Email has already sent</div>
<?php
 
}

?>
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
<div id="mySidenav" class="sidenav">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<?php if($fbUser){
  $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
  
  $user = new User();
    //Insert or update user data to the database
  $fbUserData = array(
    'oauth_provider'=> 'facebook',
    'oauth_uid'   => $fbUserProfile['id'],
    'first_name'  => $fbUserProfile['first_name'],
    'last_name'   => $fbUserProfile['last_name'],
    'email'     => $fbUserProfile['email'],
    'gender'    => $fbUserProfile['gender'],
    'locale'    => $fbUserProfile['locale'],
    'picture'     => $fbUserProfile['picture']['data']['url'],
    'link'      => $fbUserProfile['link']
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
        $_SESSION['useremail']=$output3;


}
?>

     <div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <center>  <img src="<?php echo $output1;?> "class=" img-responsive img-circle" alt="" width="100"></center>
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
              <a href="#"data-toggle="modal" data-target="#myModal67">
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

  <a href="#" data-toggle="modal" data-target="#myModal2">Aboutus</a>
  <a href="#">Terms & Policy</a>
  <a href="#">Contact</a>

<?php }?>



</div>



<div class="container"style="width: 80%; height:auto;background:alice white; margin-left:10px;">
<img src="images/tiffin.jpeg" width="200" height="200">
<div class="alert alert-success" style="width:40%; height:200px; margin-left:210px;margin-top:-200px;">
<label style="font-size:28px; font-width:100px; margin-left:30px;"><?php echo $name;?> </label>
<label style="color:red; margin-left:20px;font-size:16px;"><?php echo $address;?></label>
<br><br>
<label style="font-color:pink; font-size:16px;margin-left:10px;">Price:</label><h5 style="margin-top:-25px;margin-left:70px;">2400 (sunday off)</h3>

<input type="submit" name="confirm" id="confirmorder" data-toggle="modal" data-target="#confirmorder1"class="btn btn-success btn-lg"style="margin-top:-60px;">
</div>
<div class="alert alert-success"style="width:40%; height:200px; margin-left:650px;margin-top:-220px;">
<h3>If You Like,Please Rate us!</h3>
 <fieldset id='demo1' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5" />
                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>

                    </fieldset>


</div>
<div class="page-header"><h3>Menu</h3>
<div class="row"style="margin-left:20px;">
  <div class="column">
    <img src="images/food.jpg" style="width:70%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="images/meal.jpg" style="width:70%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
  </div>
  
</div>

<div id="myModal" class="modal mfr">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content cont">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="images/food.jpg" style="width:60%">
    </div>

   <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="images/meal.jpg" style="width:60%">
    </div>
 <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    
    
</div>
</div>

</div>
<div class="page-header">

<h3>About</h3>
</div>
<label style="font-size:16px;font-color:blue;">Breakfast Timing:</label><label style="margin-left:50px;color:blue;">9:00AM-10:00AM</label><br>
<label style="font-size:16px;font-color:red;">Lunch Timing:</label><label style="margin-left:50px;color:blue;">9:00AM-10:00AM</label><br>
<label style="font-size:16px;font-color:red;">Dinner Timing:</label><label style="margin-left:50px;color:blue;">9:00AM-10:00AM</label>
<br><br>
<br>
<?php
$userreview="select * from rating  where userfbid='$useremail' and tiffincenterhash='$id'";
$run2=$connection->query($userreview);
$row=$run2->fetch_assoc();
$r=$row['review'];
?>

<div class="jumbotron" style="width:auto;">
<h3 style="margin-left:-30px;margin-top:-30px;">Reviews</h3>
<img src="<?php echo $userimage;?>"width="100" height="80"style="margin-left:-42px;">
<form method="post" action="insertorder.php" id="formsend">
    <div class="form-group"style="margin-left:60px;margin-top:-70px;">
      <textarea class="form-control" rows="3" id="comment" name="review" placeholder="add a comments"></textarea>
    </div>
<input type="submit"  id="button" name="subt" class="btn btn-primary"style="margin-left:930px;margin-top:-130px;">
  </form>
<?php
$totalreview="select count(review)  as total from rating where tiffincenterhash='$id'";
$run3=$connection->query($totalreview);
$row=$run3->fetch_assoc();
$r1=$row['total'];
?>
<?php if($fbUser){
if(!empty($r)){?><p><img src="<?php echo $userimage;?>" class="img-circle" width="50"/><?php echo $r;?></p><?php } }?>

<a href="#" id="viewreview"> All reviews <span class="badge"><?php echo $r1;?></span></button><br>
<?php
$userreview="select review from rating  where tiffincenterhash='$id'";

$result5 = $connection->query($userreview);
$rows5 = $result5->num_rows;

for($j = 0 ; $j < $rows5 ; ++$j){
  $result5->data_seek($j);
  $row5 = $result5->fetch_array();
 ?>
 
<div id="rd">
<div class="alert alert-info"><?php echo $row5['review'];?></div>
<?php }?>
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
       <div><center><?php echo $output; ?></center></div>  
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<script>function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

</script>   
<script>
$(document).ready(function(){
    $("#viewreview").click(function(){
        $("#rd").toggle();
    });
});
</script>
<?php

if(!empty($_POST['review'])&& isset($_POST['review'])&&isset($_POST['subt'])){

$review=$_POST['review'];
if(!$fbUser){
echo '<script>alert("gh");</script>';
}else{
$reviewquery="INSERT INTO rating values"."('$output3','$review','','$id')";
$run1=$connection->query($reviewquery);
if($run1==False)

{
echo $connection->error;

}
}
}
$connection->close();

?>
<script>
$(document).ready(function(){
$("#success-alert").fadeTo(1000, 500).slideUp(500, function(){
    $("#success-alert").alert('close');
});
});
</script>
<div class="modal fade" id="myModal67" role="dialog">
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
<?php
require_once "footer.html";
?>
<div class="modal fade" id="confirmorder1" role="dialog"> 
<div class="modal-dialog">
<div class="modal-content"> 
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Reset Password</h4>
</div>
<div class="modal-body" style="padding:40px 50px">
<p>
<form action="insertorder.php" method="POST" role="form">
<label>Select Your tiffin pack</label>
<div class="radio">
      <label><input type="radio" name="pack">Trial Pack(3 Days)</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="pack">Monthly Pack</label>
    </div>
    <br><label>Do you want change your shipping Address for this order</label>
    <div class="radio">
      <label><input type="radio" name="yes" value="yes">Yes</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="yes" value="no" id=edit>No</label>
    </div>
<div class="form-group" style="display:none;">
<label for="userpassword"></label>
<input type="text" class="form-control" name="shippingaddress" placeholder="Enter  New shipping Address">
</div>



    </p>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-default" name="confirm" value="confirm my order">
</form>

</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="yes"){
            $(".form-group").show();
           }

    if($(this).attr("value")=="no"){
            $(".form-group").hide();
           }
        
  });
  });
</script>
</body>
</html>