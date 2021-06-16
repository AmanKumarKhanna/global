
<?php 
      include("connection.php");
if(isset($_GET['update']))
  {
     $qry="UPDATE product_size set  product_size = ".$_POST['size']."
            WHERE size_id =".$_GET['sid'];

  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from product_size where size_id=".$_REQUEST['sid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
   
    $qry="DELETE FROM product_size where size_id=".$_REQUEST['sid'];
  }
  else
  {   
    $qry="INSERT INTO product_size(product_size) VALUES('".$_POST['size']."')";               
  }

  // echo $qry;
  // exit();

   if(mysqli_query($con,$qry)) 
    {
      header("location:size.php");
    }
    else
    {
      echo mysqli_error($con);
    }
mysqli_close($con);
?>

