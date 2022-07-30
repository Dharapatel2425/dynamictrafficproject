<?php
session_start();
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
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Status</span></a>
                        <ul>
                            <li><a href="livestatus.php"><span class="xn-text">Signal Status</span></a></li>
                            <li><a href="managesignal.php"><span class="xn-text">Manage Signal</span></a></li>
                            <li><a href="managesensor.php"><span class="xn-text">Manage Sensor</span></a></li>
                        </ul>
                    </li>
                    <li class="active">
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
                    <li class="active">Signal Location</li>
                </ul>
                <!-- END BREADCRUMB --> 

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Signal Location</h2>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <!-- START PANELS WITH CONTROLS -->
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START GOOGLE MAP WITH MARKER -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Google Map </h3>
                                    <div class="pull-right" style="width: 200px;">
                                        <input type="text" id="target_search" class="form-control" placeholder="Search" />
                                    </div> 
                                </div>
                                <div class="panel-body panel-body-map">
                                    <div id="google_ptm_map" style="width: 100%; height: 600px;"></div>
                                </div>
                            </div>
                            <!-- END GOOGLE MAP WITH MARKER -->

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

        <!-- START THIS PAGE PLUGINS-->        
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyATkht2Czw_n9SEO3soJtSHg2UPbRZfkeI&sensor=true&libraries=places" type="text/javascript"></script>

        <script type="text/javascript">

            var map;
            var geocoder;
            var marker;
            var people = new Array();
            var latlng;
            var infowindow;

            $(document).ready(function() {
                ViewCustInGoogleMap();
            });

            function ViewCustInGoogleMap() {
                <?php
                   include_once 'conn.php';
                   $query_loc=mysqli_query($conn,"SELECT * FROM signal_mst");
                   $data = array();
                   $flag = true;
                   while($result_data=mysqli_fetch_array($query_loc))
                   {
                        if($flag){
                        $flag = false;
                        $lat = $result_data['latitude'];
                        $log = $result_data['longitude'];
                        }                 


                        $obj = array();
                        $obj['DisplayText'] = $result_data['signal_id'];
                        $obj['Address'] = $result_data['area'];
                        $obj['LatitudeLongitude'] = $result_data['latitude'] . ', '. $result_data['longitude'];
                        $obj['MarkerId'] = 'Signal';
                        if($result_data['signal_status'] == 'ON'){
                          $obj['Signal_Icon'] = 'signal_on.png';
                        }else{
                          $obj['Signal_Icon'] = 'signal_off.png';
                        }
                        $data[]=$obj;
                   }
                ?>

                var mapOptions = {
                    center: new google.maps.LatLng(<?=$lat?>,<?=$log?>),   // Coimbatore = (11.0168445, 76.9558321)
                    zoom: 16,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("google_ptm_map"), mapOptions);

                // Get data from database. It should be like below format or you can alter it.

                // Create the search box and link it to the UI element.
                var input = document.getElementById('target_search');
                var searchBox = new google.maps.places.SearchBox(input);
                //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                  searchBox.setBounds(map.getBounds());
                });

                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    if (places.length == 0) {
                      return;
                    }
                    

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        var icon = {
                            url: place.icon,
                            size: new google.maps.Size(71, 71),
                            origin: new google.maps.Point(0, 0),
                            anchor: new google.maps.Point(17, 34),
                            scaledSize: new google.maps.Size(25, 25)
                        };

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });

                var data = '<?= json_encode($data); ?>';

                // var data = '[{ "DisplayText": "adcv", "ADDRESS": "Jamiya Nagar Kovaipudur Coimbatore-641042", "LatitudeLongitude": "21.224736,72.821562", "MarkerId": "Customer" },{ "DisplayText": "abcd", "ADDRESS": "Coimbatore-641042", "LatitudeLongitude": "21.223005,72.878718", "MarkerId": "Customer"}]';

                people = JSON.parse(data); 

                for (var i = 0; i < people.length; i++) {
                    setMarker(people[i]);
                }     


            }

            function setMarker(people) {
                geocoder = new google.maps.Geocoder();
                infowindow = new google.maps.InfoWindow();
                if ((people["LatitudeLongitude"] == null) || (people["LatitudeLongitude"] == 'null') || (people["LatitudeLongitude"] == '')) {
                    geocoder.geocode({ 'address': people["Address"] }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                            marker = new google.maps.Marker({
                                position: latlng,
                                map: map,
                                draggable: false,
                                html: people["DisplayText"],
                                icon: "http://localhost/DynamicTraffic/admin/assets/images/signal/"+ people['Signal_Icon']
                                // icon: "images/marker/" + people["MarkerId"] + ".png",
                            });
                            // marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
                            //marker.setPosition(latlng);
                            //map.setCenter(latlng);
                            google.maps.event.addListener(marker, 'click', function(event) {
                                infowindow.setContent(this.html);
                                infowindow.setPosition(event.latLng);
                                infowindow.open(map, this);
                            });
                        }
                        else {
                            alert(people["DisplayText"] + " -- " + people["Address"] + ". This address couldn't be found");
                        }
                    });
                }
                else {
                    var latlngStr = people["LatitudeLongitude"].split(",");
                    var lat = parseFloat(latlngStr[0]);
                    var lng = parseFloat(latlngStr[1]);
                    latlng = new google.maps.LatLng(lat, lng);
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        draggable: false,               // cant drag it
                        html: people["DisplayText"],    // Content display on marker click
                        //icon: "images/marker.png"       // Give ur own image
                        icon: "http://localhost/DynamicTraffic/admin/assets/images/signal/"+ people['Signal_Icon']

                    });
                    //marker.setPosition(latlng);
                    //map.setCenter(latlng);
                    google.maps.event.addListener(marker, 'click', function(event) {
                        infowindow.setContent(this.html);
                        infowindow.setPosition(event.latLng);
                        infowindow.open(map, this);
                    });
                }
            }

        </script>

        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-europe-mill-en.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-us-aea-en.js'></script>

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
               
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="js/settings.js"></script>-->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>

        <!--  <script type="text/javascript" src="js/demo_maps.js"></script>-->
        <!-- END TEMPLATE -->

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