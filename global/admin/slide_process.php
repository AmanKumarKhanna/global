<?php
  include("connection.php");


if(isset($_GET['update']))
  {
    move_uploaded_file($_FILES['slide_image']['tmp_name'],"./image/slide/".$_FILES['slide_image']['name']);
    $qry="UPDATE slide_master SET '".$_POST['slide_title']."',
                                  '".$_FILES['slide_image']['name']."',
                                  '".$_POST['slide_desc']."'
                                   WHERE slide_id =".$_GET['s_id'];
                                   unlink("./images/product/".$_GET['imgid']);
  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from slide_master where slide_id=".$_REQUEST['s_id'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
   $image=$lst['slide_image'];
    unlink("./image/slide/".$image);
    $qry="DELETE FROM slide_master where slide_id=".$_REQUEST['s_id'];
  }
  else
  {   
    move_uploaded_file($_FILES['slide_image']['tmp_name'],"./image/slide/".$_FILES['slide_image']['name']);
    $qry="INSERT INTO slide_master(slide_title,slide_image,slide_desc,is_active) 
           VALUES('".$_POST['slide_title']."',
                  '".$_FILES['slide_image']['name']."',
                  '".$_POST['slide_desc']."',
                  '".$_POST['isactive']."'
                )";
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