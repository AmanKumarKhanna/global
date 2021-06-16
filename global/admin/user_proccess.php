	<?php
	include("connection.php");


if(isset($_GET['update']))
{

		if (move_uploaded_file($_FILES['userimage']['tmp_name'],"./image/user/".$_FILES['userimage']['name'])) {
		$qry="UPDATE user set user_name = '".$_POST['name']."',
					 		user_email = '".$_POST['email']."',
							user_image = '".$_FILES['userimage']['name']."',
							user_gender = '".$_POST['gender']."',
							user_dob = '".$_POST['dob']."',
							user_address = '".$_POST['address']."',
							user_contact = '".$_POST['contact']."',
							user_pwd = '".$_POST['pwd']."'
							
								  WHERE user_id =".$_GET['uid'];
			
		}else
		{
		$qry="UPDATE user set user_name = '".$_POST['name']."',
					 		user_email = '".$_POST['email']."',
							user_gender = '".$_POST['gender']."',
							user_dob = '".$_POST['dob']."',
							user_address = '".$_POST['address']."',
							user_contact = '".$_POST['contact']."',
							user_pwd = '".$_POST['pwd']."'
								WHERE user_id =".$_GET['uid'];
	}
// exit($qry);
	}
elseif (isset($_GET['delete'])) 
	{
		$qry1="SELECT * from user where user_id=".$_REQUEST['uid'];
		$result=mysqli_query($con,$qry1);
		$lst=mysqli_fetch_assoc($result);
		$image=$lst['user_image'];
		$qry="DELETE FROM user where user_id=".$_REQUEST['uid'];
		unlink("./image/user/".$image);
	}
else
	{
		move_uploaded_file($_FILES['userimage']['tmp_name'],"./image/user/".$_FILES['userimage']['name'] );
		 $qry="INSERT INTO user(user_name,user_email,user_image,user_gender,user_dob,user_address,user_contact
			  					,user_pwd,user_type) 
					 values('".$_POST['name']."',
					 		'".$_POST['email']."',
							'".$_FILES['userimage']['name']."',
							'".$_POST['gender']."',
							'".$_POST['dob']."',
							'".$_POST['address']."',
							".$_POST['contact'].",
							'".$_POST['pwd']."',
							'".$_POST['u_type']."')";

						
						

	}

   if(mysqli_query($con,$qry)) 
    {
		header("location:user.php");
	}
	else
	{
		echo mysqli_error($con);
	}
mysqli_close($con);
?>

