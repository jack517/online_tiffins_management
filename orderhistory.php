<?php
require_once"logincontent.php";
?>
<!doctype html>
<html>
</body>
<div class="containert" style="width: 100%; max-width: 100%;">
    <div class="mdl-grid fd-11-o-clock-action-bar" style="height: 11em;">
         <div class="mdl-cell mdl-cell--12-col">
            <span style="cursor:pointer;" onclick="openNav()"></span>
        <h2 style="text-align:center;">Your Order History</h2>
         </div>
  </div>
  <div>
   <table class="table table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Tiffin Center</th>
      <th>Status</th>
      <th>Starting Date</th>
      <th>Ending Date</th>
      <th>Order Cancellation</th>
    </tr>
  </thead>
  <tbody>




<?php
$customer=$_SESSION['Name'];
$query = "select * from user where username='$customer'";

$result = $connection->query($query);
if (!$result) die ("Database access failed: " . $con->error);

$rows = $result->num_rows;

for($j = 0; $j<$rows;++$j){
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_NUM);

  if($row[3] == 1){
    $status = "Ongoing";
    $button = "Cancel Order";
    $class="btn btn-danger";

  }
  else{
    $status = "Cancelled";
    $button = "disabled";
    $class="btn btn-default";
  }

?>
    <tr>
      <th scope="row"><?php echo $row[1];?></th>
      <td><?php echo $row[2];?></td>
      <td><?php echo $status;?></td>
      <td><?php echo $row[4];?></td>
      <td><?php echo $row[5];?></td>
      <td>
        <form action ="cancelorder.php" method ="post"><input type="hidden" name="orderid" value="<?php echo $row[0];?>">
      <button type="submit" name="orders" value="Cancel" class="<?php echo $class;?>"> <?php echo $button;?></button></form></td>
      </tr>
<?php
}
?>

</tbody>
</table>
  


  </div>
