
<?php 

// print_r($_POST);
// exit();

include("connection.php");
if(isset($_GET['update']))
  {
    $qry=" UPDATE offers SET pro_id = ".$_POST['pro_id'].",
                               o_desc = ".$_POST['o_desc'].",
                               o_date = ".$_POST['totime'].",
                             o_status = ".$_POST['status'].",
                           o_priority = ".$_POST['priority']."
                             WHERE o_id=".$_REQUEST['oid']." ";
  }
  elseif (isset($_GET['delete'])) 
  {

      $qry = "DELETE  FROM offers where o_id=".$_REQUEST['oid'];
  }
  else 
  { 
    echo  $qry="INSERT INTO `offers`(`pro_id`, `o_desc`, `o_date`, `o_status`, `o_priority`) VALUES ({$_POST['pro_id']},'{$_POST['o_desc']}','{$_POST['totime']}','{$_POST['status']}',{$_POST['priority']})";
                  
  }

   if(mysqli_query($con,$qry)) 
    {
    header("location:offers.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

