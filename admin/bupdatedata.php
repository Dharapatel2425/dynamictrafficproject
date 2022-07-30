<?php
session_start();

if (isset($_SESSION['username'])=="admin") {

    include_once 'conn.php';

	$ID = mysqli_real_escape_string($conn, $_POST['Id']);
    $uname = mysqli_real_escape_string($conn, $_POST['UName']);
    $email = mysqli_real_escape_string($conn, $_POST['EmailId']);
    $number = mysqli_real_escape_string($conn, $_POST['Phone']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $signal_id = mysqli_real_escape_string($conn, $_POST['SignalId']);
    $city = mysqli_real_escape_string($conn,$_POST['City']);
    $area = mysqli_real_escape_string($conn,$_POST['Area']);
    $pincode = mysqli_real_escape_string($conn, $_POST['Pincode']);


    $sqlQuery="UPDATE traffic_brigade SET name='$uname' , email='$email' , phonenumber=$number , address='$address' , signal_id='$signal_id' , city='$city' , area='$area' , pincode=$pincode WHERE id=$ID";
    
    $result=mysqli_query($conn,$sqlQuery);
    
    if($result) {
             
        $msg = "Successfully Updated!";
        //echo $msg;
        header('location:register.php?msg='.$msg);
          
    } else {
            
        $msg = "Error in updating...Please try again later!";
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