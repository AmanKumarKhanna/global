
<?php 


include("connection.php");
if(isset($_GET['update']))
  {
    if( move_uploaded_file($_FILES['image']['tmp_name'],"./image/sub_category/".$_FILES['image']['name']))
         {
             $qry="UPDATE sub_category set  sub_cat_name ='".$_POST['name']."',
                                            cat_id = '".$_POST['cat_id']."',
                                            sub_cat_image = '".$_FILES['image']['name']."',
                                            sub_cat_desc = '".$_POST['desc']."'
                                            WHERE sub_cat_id =".$_GET['sid'];

        }
        else
        {
        $qry="UPDATE sub_category set sub_cat_name ='".$_POST['name']."',
                                      cat_id = '".$_POST['cat_id']."',
                                      sub_cat_image = '".$_FILES['image']['name']."',
                                      sub_cat_desc = '".$_POST['desc']."'
                                       WHERE sub_cat_id =".$_GET['sid'];

        }
  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from sub_category where sub_cat_id=".$_REQUEST['sid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
   $image=$lst['sub_cat_image'];
    unlink("./image/sub_category/".$image);
    $qry="DELETE FROM sub_category where sub_cat_id=".$_REQUEST['sid'];
  }
  else
  {   
    move_uploaded_file($_FILES['image']['tmp_name'],"./image/sub_category/".$_FILES['image']['name']);
    $qry="INSERT INTO sub_category(sub_cat_name,cat_id,sub_cat_image,sub_cat_desc) 
           VALUES('".$_POST['name']."',
                  '".$_POST['cat_id']."',
                  '".$_FILES['image']['name']."',
                  '".$_POST['desc']."')";                  
  }

    // exit();

   if(mysqli_query($con,$qry)) 
    {
    header("location:sub_category.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

