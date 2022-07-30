<?php
session_start();

if (isset($_SESSION['username'])=="admin") {
	
	include_once 'conn.php';
	
	if(isset($_GET['ID']))
	{
		$ID=$_GET['ID'];
		$query1=mysqli_query($conn,"DELETE FROM traffic_brigade WHERE id='$ID'");
		if($query1)
		{
			$msg = "Successfully deleted!";
			header('location:register.php?msg='.$msg);
		}
		else {
			$msg = "Error in deleting...Please try again later!";
			header('location:register.php?msg='.$msg);
            //echo $msg;
		}
	}else {
			
		$msg = "Id not found...Please try again later!";
		header('location:register.php?msg='.$msg);
        //echo $msg;
	}
}
else
{
  $msg = "You can not access";
  header("location: login.php?er=4");
}
?>
