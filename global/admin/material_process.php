<?php
  include("connection.php");


if(isset($_GET['update']))
  {
    $qry="UPDATE product_material set material_name = '".$_POST['materialname']."' WHERE material_id =".$_GET['materialid'];

  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from product_material where material_id=".$_REQUEST['materialid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);

    $qry="DELETE FROM product_material where material_id=".$_REQUEST['materialid'];
  }
  else
  {   
    $qry="INSERT INTO product_material(material_name) VALUES('".$_POST['material_name']."')";
  }

   if(mysqli_query($con,$qry)) 
    {
    header("location:material.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

