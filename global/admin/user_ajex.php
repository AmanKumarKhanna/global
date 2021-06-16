<style type="text/css">
	
	.img_user{
		width: 200px;
		height: 200px;
		border-width: 10px;
		border-radius: 50%;
		border-color:pink;
		border-style: solid;
	}

</style>
<?php
	include "connection.php";
    $qry="SELECT * FROM user where user_id=".$_GET['id'];
    $result=mysqli_query($con,$qry);;
    $res=mysqli_query($con,$qry);
    $row=mysqli_fetch_assoc($res);
?>


	<img class="img_user" src="./image/user/<?php echo $row['user_image']; ?>"><br>

	
	<p>
		<b>Username - </b>
		<?php echo $row['user_name']; ?>
	</p>	
	<p>
		<b>User Email - </b>
		<?php echo $row['user_email']; ?>
	</p>	
	<p>
		<b>Gender - </b>
		<?php echo $row['user_gender']; ?>
	</p>	
	<p>
		<b>Date Of Birth - </b>
		<?php echo $row['user_dob']; ?>
	</p>	
	<p>
		<b>Address - </b>
		<?php echo $row['user_address']; ?>
	</p>	
	<p>
		<b>Contact - </b>
		<?php echo $row['user_contact']; ?>
	</p>	
	