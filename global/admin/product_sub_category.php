<?php
include "connection.php";
$qry = "select * from sub_category where cat_id=".$_GET['id'];
$res= mysqli_query($con,$qry);
while ($row=mysqli_fetch_assoc($res)) {
	echo "<option value='".$row['sub_cat_id']."'> ".$row['sub_cat_name']." </option>";
	// echo $row['sub_cat_name'];
}

?>