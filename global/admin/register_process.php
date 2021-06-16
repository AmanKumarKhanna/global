<?php
  include("connection.php");


  $qry= "INSERT INTO user(user_name,user_email,user_pwd) VALUES('".$_POST['name']."',
                        '".$_POST['email']."',
                        '".$_POST['password']."')";
   if(mysqli_query($con,$qry)) 
    {
    header("location:login.php");
  }
  else
  {
    echo mysqli_error($con);
  }
mysqli_close($con);
?>

