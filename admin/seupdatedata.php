<?php
session_start();

if (isset($_SESSION['username'])=="admin") {

    include_once 'conn.php';

        $RowId = $_GET['ID'];
        echo $RowId;

		$ID = mysqli_real_escape_string($conn, $_POST['Id']);
        $signal_id = mysqli_real_escape_string($conn, $_POST['SignalId']);
        $sensor_id = mysqli_real_escape_string($conn, $_POST['SensorId']);
        $sensor_type = mysqli_real_escape_string($conn, $_POST['SensorType']);

        $sqlQuery="SELECT * FROM sensor_mst WHERE signal_id='$signal_id' AND sensor_id='$sensor_id'" ;
        $result=mysqli_query($conn,$sqlQuery);
        if(mysqli_num_rows($result) == 0)
        {
            $sqlQuery1="UPDATE sensor_mst SET signal_id='$signal_id' , sensor_id='$sensor_id' , sensor_type='$sensor_type' WHERE id=$ID";
            $result1=mysqli_query($conn,$sqlQuery1);
            if($result1) {
             
                $msg = "Successfully Updated!";
                //echo $msg;
                header('location:managesensor.php?msg='.$msg);
          
            } else {
            
                $msg = "Error in updating...Please try again later!";
                header('location:managesensor.php?msg='.$msg);
                //echo $msg;
            }
        }
        else{
            
            $msg="Sensor id Already Exist for this signal id!";
            header('location:updatesensor.php?ID='.$RowId.'&msg='.$msg);
            //echo $msg;
        }
           
}
else
{
  $msg = "You can not access";
  header("location: login.php?er=4");
}
?>