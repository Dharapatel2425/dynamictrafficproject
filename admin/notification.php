<?php

if (isset($_SESSION['username'])=="admin") {
    include_once 'conn.php';
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dynamic Traffic Management</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
                    <!-- Notifications -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-bell"></span></a>
                        <?php
                            //include_once 'conn.php';
                            $sqlQuery="SELECT * FROM signal_mst WHERE sensor_fault!=0";
                            $result=mysqli_query($conn,$sqlQuery);
                            $num_msg=mysqli_num_rows($result);
                           // $ID=1;
                            if($num_msg>0){
                            
                        ?>
                        <div class="informer informer-danger"><?php echo $num_msg; ?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-bell"></span> Notifications</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger"><?php echo $num_msg; ?> new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <?php
                                    while($row_msg=mysqli_fetch_array($result))
                                    {
                                        echo "<a href=\"#\" class=\"list-group-item\">
                                            <div class=\"list-group-status status-online\"></div>
                                            <span class=\"contacts-title\">Signal Id: ".$row_msg['signal_id']."</span><br/>
                                            <span class=\"contacts-title\">Sensor Id: ".$row_msg['sensor_fault']." Sensor Fault</span>
                                            <p>Area : ".$row_msg['area']."</p>
                                            </a>";
                                    }
                                ?>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="livestatus.php">Show all Notifications</a>
                            </div>                            
                        </div>
                        <?php 
                                }
                        ?>                        
                    </li>
                    <!-- END NOtificationS -->
                    
        
    </body>
</html>
<?php
}
else
{
  $msg = "You can not access";
  header("location: login.php?er=4");
}
?>