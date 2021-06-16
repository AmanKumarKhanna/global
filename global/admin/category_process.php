<?php 
// exit();
      include("connection.php");
if(isset($_GET['update']))
  {

    if( move_uploaded_file($_FILES['catimage']['tmp_name'],"./image/category/".$_FILES['catimage']['name']))
     {
         $qry="UPDATE category set cat_name ='".$_POST['catname']."',
                                  cat_image = '".$_FILES['catimage']['name']."',
                                  cat_desc = '".$_POST['catdesc']."'
                                   WHERE cat_id =".$_GET['uid'];
                      unlink("./image/category/".$lst['catimage']);
    }
    else
    {
    $qry="UPDATE category set cat_name ='".$_POST['catname']."',
                                  
                                  cat_desc = '".$_POST['catdesc']."'
                                   WHERE cat_id =".$_GET['uid'];

    }
  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from category where cat_id=".$_REQUEST['cid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
   $image=$lst['catimage'];
    unlink("./image/category/".$image);
    $qry="DELETE FROM category where cat_id=".$_REQUEST['cid'];
  }
  else
  {   
    move_uploaded_file($_FILES['catimage']['tmp_name'],"./image/category/".$_FILES['catimage']['name']);
    $qry="INSERT INTO category(cat_name,cat_image,cat_desc) 
           VALUES('".$_POST['catname']."',
                  '".$_FILES['catimage']['name']."',
                  '".$_POST['catdesc']."')";
                  
  }

   if(mysqli_query($con,$qry)) 
    {
    header("location:category.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

