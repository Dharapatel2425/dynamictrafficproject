<?php
session_start();

if (isset($_SESSION['username'])=="admin") {

	include_once 'conn.php';

	if(isset($_GET['ID']))
	{
		$ID=$_GET['ID'];
		$query=mysqli_query($conn,"SELECT signal_id FROM signal_mst WHERE id='$ID'");
		$r=mysqli_fetch_assoc($query);
		$signal_id=$r['signal_id'];
		echo $signal_id;
		$query1=mysqli_query($conn,"DELETE FROM signal_mst WHERE id='$ID'");
		$query3=mysqli_query($conn,"DELETE FROM sensor_mst WHERE signal_id='".$signal_id."'");
		if($query1)
		{
			if($query3)
			{
				$msg = "Successfully deleted signal data !";
				//echo $msg;
				header('location:managesignal.php?msg='.$msg);	
			}
			else
			{
				$msg = "Error in deleting signal data...Please try again later!";
				header('location:managesignal.php?msg='.$msg);
            	//echo $msg;
			}	
			$msg = "Successfully deleted!";
			//echo $msg;
			header('location:managesignal.php?msg='.$msg);
		}
		else {
			$msg = "Error in deleting...Please try again later!";
			header('location:managesignal.php?msg='.$msg);
            //echo $msg;
		}
	}else {
			
		$msg = "Id not found...Please try again later!";
		header('location:managesignal.php?msg='.$msg);
        //echo $msg;
	}
}
else
{
  $msg = "You can not access";
  header("location: login.php?er=4");
}
?>