<?php
session_start();

if (isset($_SESSION['username'])=="admin") {

    include_once 'conn.php';

    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
        //echo $msg;
    }
  
    if(isset($_GET['ID']))
    {
        $ID=$_GET['ID'];
        $sqlQuery1=mysqli_query($conn,"SELECT * FROM signal_mst WHERE id='$ID'");
        $row1=mysqli_fetch_assoc($sqlQuery1);
    }
    else {
            
        $msg = "Id not found...Please try again later!";
        //echo $msg;
    }
?>

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
        
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                   
                    <li class="xn-logo">
                        <a href="index.php">Dynamic Traffic</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/admin_profile.png" alt="Admin"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/admin_profile.png" alt="Administrator"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Traffic Cell</div>
                                <div class="profile-data-title">Administrator</div>
                            </div>
                        <!--    <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>-->
                        </div>                                                                        
                    </li>
                    
                    <li class="xn-title">Navigation</li>
                    <li>
                        <a href="index.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                    <!--<li>
                        <a href="messagedata.php"><span class="fa fa-comments"></span>Messages</a>
                    </li>-->                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-edit"></span> <span class="xn-text">Traffic Brigade Details</span></a>
                        <ul>
                            <li><a href="searchbrigadedetail.php"><span class="fa fa-search"></span> Search Details</a></li>
                            <li><a href="register.php"><span class="fa fa-user"></span> Add new Traffic Brigade</a></li>
                        </ul>
                    </li>
                <!--    <li>
                        <a href="#"><span class="fa fa-image"></span> <span class="xn-text">Gallery</span></a>                        
                    </li>-->
                    
                    <li class="xn-title">Components</li>
                    <li>
                        <a href="areas.php"><span class="fa fa-table"></span> <span class="xn-text">My Areas</span></a>
                    </li>                    
                    <li class="xn-openable active">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Status</span></a>
                        <ul>
                            <li><a href="livestatus.php"><span class="xn-text">Signal Status</span></a></li>
                            <li class="active"><a href="managesignal.php"><span class="xn-text">Manage Signal</span></a></li>
                            <li><a href="managesensor.php"><span class="xn-text">Manage Sensor</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="location.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Signal Location</span></a>
                    </li>                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel" id="refresh">
                    
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>
                    <!-- END SEARCH -->
                   
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                   
                    <!-- MESSAGES -->
                    <?php //include_once 'messages.php'; ?>
                    <!-- END MESSAGES -->

                    <!-- Notification -->
                    <?php include_once 'notification.php'; ?>
                    <!-- END Notiffication -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Status</a></li>                    
                    <li class="active">Manage Signal</li>
                </ul>
                <!-- END BREADCRUMB --> 

                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Traffic Signal Details</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START PANELS WITH CONTROLS -->
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START PANEL WITH CONTROL CLASSES -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Add Traffic Signal Details</h3>
                                    
                                    <ul class="panel-controls">
                                     <!--   <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>-->
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                     <!--   <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>-->
                                    </ul>                              
                                </div>

                                <form role="form" class="form-horizontal" action="siupdatedata.php" method="post">  
                                    <div class="panel-body">
                                    <!-- START VALIDATIONENGINE PLUGIN -->

                                    		<div class="form-group">
                                                <label class="col-md-3 control-label">ID:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="id" name="Id" readonly="readonly" value="<?php echo $row1['id'];?>" class="form-control"/>
                                                </div>
                                            </div>
                                                                  
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Signal Id:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="signalid" name="SignalId" value="<?php echo $row1['signal_id'];?>" class="form-control"/>
                                                  <!--  <span class="help-block">Required, max size = 30</span> -->
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Area:</label>
                                                <div class="col-md-6">
                                                    <textarea rows="2" id="area" name="Area" class="form-control"><?php echo $row1['area'];?></textarea>
                                                  <!--   <span class="help-block">Required, min size = 5, max size = 30</span>-->
                                                </div>
                                            </div>                    
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Latitude:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="latitude" name="Latitude" value="<?php echo $row1['latitude'];?>" class="form-control"/>
                                                 <!--    <span class="help-block">Required, max size =10 </span>-->
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Longitude:</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="longitude" name="Longitude" value="<?php echo $row1['longitude'];?>" class="form-control"/>
                                                   <!--  <span class="help-block">Required, integer, min value = 18, max = 120</span>-->
                                                </div>                        
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Signal Status:</label>
                                                <div class="col-md-6">
                                                    <select class="form-control select" id="signalstatus" name="SignalStatus" value="<?php echo $row1['signal_status'];?>">
                                                        <option><?php echo $row1['signal_status'];?></option>
                                                        <option value="ON">Select</option>
                                                        <option>ON</option>
                                                        <option>OFF</option>
                                                    </select>
                                            
                                                  <!--  <input type="text" id="signalstatus" name="SignalStatus" value="<?php //echo $row['signal_status'];?>"
                                                    class="form-control"/>-->
                                                  <!--   <span class="help-block">Required, integer, min value = 18, max = 120</span>-->
                                                </div>                        
                                            </div>                           
                                    </div>     
                                    <!-- END VALIDATIONENGINE PLUGIN -->

                                    <div class="panel-footer">
                                        <?php
                                            if(isset($msg)){
                                                $msg1=$msg;
                                                printf("<br/><b><center style=\"color:#000;\">$msg1</center></b>");
                                            }
                                        ?>
                                        <button class="btn btn-default pull-right">Cancel</button>                                    
                                        <button class="btn btn-primary pull-right" name="submit" id="submit">Update</button>
                                    </div>    
                                </form>
                            </div>                                 
                            <!-- END PANEL WITH CONTROL CLASSES -->
                        
                        </div>
                    </div>
                        
                        
                    </div>  
                    <!-- END SIMPLE PANELS -->

                    <!-- START PANELS WITH CONTROLS -->
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START TABLE HOVER ROWS -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Traffic Signals Detail</h3>
                                </div>
                                <div class="panel-body">
                                <?php
                                      //include_once 'conn.php';
                                    $query1=mysqli_query($conn,"SELECT * FROM signal_mst");
                                    echo"
                                    <table class=\"table table-hover\">
                                        <thead>
                                            <tr>
                                                <td>SrNo.</td>
                                                <td>ID </td>
                                                <td>Signal Id</td>
                                                <td>Area</td>
                                                <td>Sensor Fault</td>
                                                <td>SignalStatus</td>
                                                
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </thead>";
                                        $ID=1;
                                        while($row=mysqli_fetch_array($query1))
                                        {
                                           echo "<tbody>";
                                            echo "<tr class='even pointer'><td>".$ID++ ."</td>";
                                            echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['signal_id']."</td>";
                                            echo "<td>".$row['area']."</td>";
                                            /*<td>Latitude</td>
                                                <td>Longitude</td>
                                                <td>Density1</td>
                                                <td>Density2</td>
                                                <td>Density3</td>
                                                <td>Density4</td>*/
                                                
                                            //echo "<td>".$row['latitude']."</td>";
                                            //echo "<td>".$row['longitude']."</td>";
                                            //echo "<td>".$row['density1']."</td>";
                                            //echo "<td>".$row['density2']."</td>";
                                            //echo "<td>".$row['density3']."</td>";
                                            //echo "<td>".$row['density4']."</td>";
                                            echo "<td>".$row['sensor_fault']."</td>";
                                            echo "<td>".$row['signal_status']."</td>";
                            
                                            echo "<td><a class=\"btn btn-default btn-rounded btn-sm\" href='updatesignal.php?ID=".$row['id']."'><span class=\"fa fa-pencil\"></span></a></td>";
                                            echo "<td><a class=\"btn btn-default btn-rounded btn-sm\" href='deletesignal.php?ID=".$row['id']."'><span class=\"fa fa-times\"></span></a></td></tr></tbody>";
                                        }
                                    echo "</table>";  
                                ?>
                                                                    
                                </div>
                            </div>
                            <!-- END TABLE HOVER ROWS -->                          

                        </div>
                    </div>  
                    <!-- END SIMPLE PANELS -->                     
                
                </div>
                <!-- PAGE CONTENT WRAPPER -->

            </div>    
            <!-- END PAGE CONTENT -->

        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if you want to continue work. Press Yes to logout.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                      

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>

        
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>        
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-select.js'></script>        

        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>                

        <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        <!-- END PAGE PLUGINS -->        
        
        <!-- START TEMPLATE -->
      <!--  <script type="text/javascript" src="js/settings.js"></script>-->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
        
        <script>
            $("#pc_refresh").click(function(){                                        
                function p_refresh_shown(){
                    alert("shown");
                    panel_refresh($("#pc_refresh").parents(".panel"),"hidden",function(){alert("hidden")});
                }
                panel_refresh($("#pc_refresh").parents(".panel"),"shown",p_refresh_shown);

            });                         
            
            $("#pc_collapse").click(function(){                                        
                function p_collapse_hidden(){                                            
                    alert("hidden");                                            
                    panel_collapse($("#pc_collapse").parents(".panel"),"shown",function(){alert('shown')});
                }
                panel_collapse($("#pc_collapse").parents(".panel"),"hidden",p_collapse_hidden);
            });           
            
            $("#pc_remove").click(function(){                                        
                function p_remove_before(){
                    alert("before");
                    panel_remove($("#pc_remove").parents(".panel"),"after",function(){alert("after")});
                }
                panel_remove($("#pc_remove").parents(".panel"),"before",p_remove_before);

            });                 
        </script>

        <!--Ajax Call-->
        <script type="text/javascript" src="js/ajax-call.js"></script>

        <!--Auto Refresh-->
        <script type="text/javascript">
            setInterval(function() {
                $("#refresh").load(location.href+" #refresh>*","");
                }, 10000); // seconds to wait, miliseconds

        </script>     
        
    <!-- END SCRIPTS -->         
        
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