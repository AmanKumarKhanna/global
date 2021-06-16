<?php
  include("connection.php");


if(isset($_GET['update']))
  {
    $qry="UPDATE product_color set color_name = '".$_POST['colorname']."' WHERE color_id =".$_GET['colorid'];

  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from product_color where color_id=".$_REQUEST['colorid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);

    $qry="DELETE FROM product_color where color_id=".$_REQUEST['colorid'];
  }
  else
  {   
    $qry="INSERT INTO product_color(color_name) 
           VALUES('".$_POST['colorname']."')";
  }

   if(mysqli_query($con,$qry)) 
    {
    header("location:color.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

