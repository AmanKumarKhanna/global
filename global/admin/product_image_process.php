  <?php
  include("connection.php");

  for ($i=0; $i < count($_FILES['product_img']['name']) ; $i++)
   { 

          if (move_uploaded_file($_FILES['product_img']['tmp_name'][$i], "./image/product/".$_FILES['product_image']['name'][$i])) {
			    echo $qry="INSERT INTO product_master(product_id,product_img) values({$_GET['pid']},'".$_FILES['product_img']['name'][$i]."')";    
          mysqli_query($con,$qry); 

    }



  }

    header("location:product_image.php?pid={$_GET['pid']}");

if(isset($_GET['update']))
{

    move_uploaded_file($_FILES['product_img']['tmp_name'],"./image/products/".$_FILES['product_img']['name']);
    
      $qry="UPDATE product_master set product_img = '".$_FILES['product_img']['name']."'            
                                     WHERE image_id =".$_GET['imgid'];
      unlink("./images/product/".$_GET['imgid']);
}
  
  else
  {
    move_uploaded_file($_FILES['product_img']['tmp_name'],"./image/product/".$_FILES['product_img']['name'] );
    echo $qry="INSERT INTO product_master(product_img) values('".$_FILES['product_img']['name']."')";    

  }

  if (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from product_master where product_id=".$_REQUEST['imgid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);
    $image=$lst['product_img'];
    $qry="DELETE FROM product_image where product_id=".$_REQUEST['imgid'];
    unlink("./image/product/".$image);
  }

mysqli_close($con);
?>