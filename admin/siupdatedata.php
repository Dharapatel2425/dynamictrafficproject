<?php
session_start();

if (isset($_SESSION['username'])=="admin") {

    include_once 'conn.php';

	$ID = mysqli_real_escape_string($conn, $_POST['Id']);
    $signal_id = mysqli_real_escape_string($conn, $_POST['SignalId']);
    $area = mysqli_real_escape_string($conn, $_POST['Area']);
    $latitude = mysqli_real_escape_string($conn, $_POST['Latitude']);
    $longitude = mysqli_real_escape_string($conn,$_POST['Longitude']);
    $signal_status = mysqli_real_escape_string($conn,$_POST['SignalStatus']);
        
    $sqlQuery="UPDATE signal_mst SET signal_id='$signal_id' , area='$area' , latitude=$latitude , longitude=$longitude , signal_status='$signal_status' WHERE id=$ID";
    $result=mysqli_query($conn,$sqlQuery);
    if($result) {
             
        $msg = "Successfully Updated!";
        //echo $msg;
        header('location:managesignal.php?msg='.$msg);
          
    } else {
            
        $msg = "Error in updating...Please try again later!";
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