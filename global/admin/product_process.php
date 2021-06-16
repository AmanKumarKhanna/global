<?php

  include("connection.php");

    $product_img=$_FILES['product_img']['name'];



   // $product_img=$_FILES['product_img']['name'];

      
   move_uploaded_file($_FILES['product_img']['tmp_name'],"./image/product/".$_FILES['product_img']['name']);
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $offer_price = $_POST['offer_price'];
    $selling_price = $_POST['selling_price'];
    $color = $_POST['color'];
    $material = $_POST['material'];
    $cat = $_POST['cat'];
    $size = $_POST['size'];


if(isset($_GET['update']))
  {
    $qry="UPDATE product_master set product_name = '".$_POST['name']."',
                  product_img = '".$_FILES['product_img']['name']."',
                  product_discription = '".$_POST['desc']."',
                  offer_price = ".$_POST['offer_price'].",
                  selling_price = '".$_POST['selling_price']."',
                  color_id='".$_POST['color']."',
                  material_id='".$_POST['material']."',
                  cat_id='".$_POST['cat']."',
                  size_id='".$_POST['size']."' 

                  WHERE product_id =".$_GET['pid'] ;
                 // unlink('./image/product/.$product_img' );
  
  
  }
  elseif (isset($_GET['delete'])) 
  {
    $qry1="SELECT * from product_master where product_id=".$_REQUEST['pid'];
    $result=mysqli_query($con,$qry1);
    $lst=mysqli_fetch_assoc($result);

    $qry="DELETE FROM product_master where product_id=".$_REQUEST['pid'];
  }
  else
  {  


    
    $qry = "INSERT INTO `product_master`(`product_img`,`product_name`, `product_discription`, `color_id`, `material_id`, `cat_id`, `size_id`, `offer_price`, `selling_price`) VALUES('$product_img','$name','$desc','$color','$material','$cat',$size,'$offer_price','$selling_price')";

   //  $qry="INSERT INTO product_master(product_name,product_discription,offer_price,selling_price,color_id,material_id,cat_id,sub_cat_id,size_id) 
   // VALUES('".$_POST['name']."','".$_POST['desc']."',".$_POST['offer_price'].",".$_POST['selling_price'].",{$_POST['color']},{$_POST['material']},{$_POST['cat']},{$_POST['sub_cat']},{$_POST['size']} )";
  
  }

  // exit($qry);

   if(mysqli_query($con,$qry)) 
    {
    header("location:product.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

