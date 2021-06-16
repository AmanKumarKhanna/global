<?php
  include("connection.php");


if(isset($_GET['update']))
  {
    $qry="UPDATE order_receipt set '".$_POST['qty']."',
                                   '".$_POST['total_amount']."',
                                   WHERE receipt_id =".$_GET['receipt_id'];

  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from order_receipt where order_id=".$_REQUEST['receipt_id'];
    $result=mysqli_query($con,$qry1);
 

    $qry="DELETE FROM order_receipt where order_id=".$_REQUEST['receipt_id'];
  }
  else
  {   
    $qry="INSERT INTO order_receipt(qty,total_amount) 
           VALUES('".$_POST['qty']."',
                   '".$_POST['total_amount']."')";
                 
        print_r($qry);
  }

   if(mysqli_query($con,$qry)) 
    {
    header("location:order_receipt.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

