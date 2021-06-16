<?php
  include("connection.php");


if(isset($_GET['update']))
  {
       $qry="UPDATE page_master set title ='".$_POST['title']."',                               
                                   page_desc = '".$_POST['page_desc']."'
                                   WHERE page_id =".$_GET['p_id'];
  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from page_master where page_id=".$_REQUEST['p_id'];
    $result=mysqli_query($con,$qry1);
    
    $qry="DELETE FROM page_master where page_id=".$_REQUEST['p_id'];
 }
  else
  {      
    $qry="INSERT INTO page_master(title,page_desc) 
           VALUES('".$_POST['title']."',
                  '".$_POST['page_desc']."')";     

  }
// exit($qry);
   if(mysqli_query($con,$qry)) 
    {
    header("location:page_master.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>


