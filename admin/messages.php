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
                    <!-- MESSAGES -->
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <?php
                            //include_once 'conn.php';
                            $sqlQuery="SELECT * FROM feedback_mst";
                            $result=mysqli_query($conn,$sqlQuery);
                            $num_message=mysqli_num_rows($result);
                           // $ID=1;
                            if($num_message>0){
                            
                        ?>
                        <div class="informer informer-warning"><?php echo $num_message; ?></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning"><?php echo $num_message; ?> new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <?php
                                    while($row_message=mysqli_fetch_array($result))
                                    {
                                        echo "<a href=\"#\" class=\"list-group-item\">
                                            <div class=\"list-group-status status-online\"></div>
                                            <img src=\"assets/images/users/no-image.jpg\" class=\"pull-left\" alt=\"User\"/>
                                            <span class=\"contacts-title\">".$row_message['user_name']."</span><br/>
                                            <p>".$row_message['subject']."</p>
                                            </a>";
                                    }
                                ?>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="messagedata.php">Show all Messages</a>
                            </div>                            
                        </div>
                        <?php 
                                }
                        ?>                        
                    </li>
                    <!-- END MESSAGES -->
                    
        
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