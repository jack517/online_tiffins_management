<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                              // Enable SMTP authentication
$mail->Username = 'mg99673@gmail.com';                 // SMTP username
$mail->Password = 'papamommanu@1234';                    // SMTP password
$mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                   // TCP port to connect to

$mail->setFrom('mg99673@gmail.com');
$mail->addReplyTo('mg99673@gmail.com');
$mail->addAddress('mg99673@gmail.com');  
$mail->isHTML(true);  

$bodyContent = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="conatiner">
<h3> Hello!'.$_SESSION['Name'].'</h3> <p>Thanks for choosing Us</p>
<label>Your order detail are given below</label>
<label>OrderId:<label><br>
<label>Tiffin center:</label><br>
<label>Shipping address:</label><br>
</div>
<br>
<p>If any problem .Please contact us <a href="#">mg99673@gmail.com</a></p>
</body>
</html>';
$mail->Subject = 'Order Confirmation Email';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

} else {
    $sendmsg='<div class="alert alert-success"id="myAlert">Your order has been confirmed.Check Your Email</div>';
$_SESSION['msg']=$sendmsg;
}
?>
