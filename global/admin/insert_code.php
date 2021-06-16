<?php
	
	include'connection.php';

		$name=$_POST['name'];
		$email=$_POST['email'];
		$image=$_POST['img'];
		$radio=$_POST['radio'];
		$dob=$_POST['dob'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		$password=$_POST['pwd'];

		$qry="insert into user(user_name,user_email,user_image,user_gender,user_dob,user_address,user_contact
			  ,user_pwd)
			  values('$name','$email','$image','$radio',$dob,'$address',$contact,'$password')";

		 if(mysqli_query($con,$qry))
		 {
		 	header("location:user.php");
		 }
		 else
		 {
		 	echo mysqli_error($con);
		 }
		

?>


