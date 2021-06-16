<?php
  include("connection.php");


if(isset($_GET['delete']))
  {
   echo $qry1="SELECT * from slide_master where slide_id=".$_REQUEST['s_id'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
   $image=$lst['slide_image'];
    unlink("./image/slide/".$image);
    echo $qry="DELETE * FROM slide_master where slide_id=".$_REQUEST['s_id'];
    die("test");
  }
   if(mysqli_query($con,$qry)) 
    {
    header("location:slide_master.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>
