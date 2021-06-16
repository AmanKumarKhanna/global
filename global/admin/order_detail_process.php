<?php
  include("connection.php");


if(isset($_GET['update']))  {
    $qry = "UPDATE `orders` SET `status`='".$_POST['status']."' WHERE order_id=".$_POST['order_id'];
  }


  if(mysqli_query($con,$qry))     {
    header("location:order_detail.php");
  }
  else  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

