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
                <!--    <li class="active">
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
                    <?php // include_once 'messages.php'; ?>
                    <!-- END MESSAGES -->

                    <!-- Notification -->
                    <?php include_once 'notification.php'; ?>
                    <!-- END Notiffication -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb push-down-0">
                    <li><a href="#">Home</a></li>
                    <li class="active">Gallery</li>
                </ul>
                <!-- END BREADCRUMB -->                                                
                
                <!-- START CONTENT FRAME -->
                <div class="content-frame">   
                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">                        
                        <div class="page-title">                    
                            <h2><span class="fa fa-image"></span> Gallery</h2>
                        </div>                                      
                        <div class="pull-right">                            
                            <button class="btn btn-primary"><span class="fa fa-upload"></span> Upload</button>
                        </div>                         
                    </div>
                    
                    <!-- START CONTENT FRAME RIGHT -->
                    
                    <!-- END CONTENT FRAME RIGHT -->
                
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body content-frame-body-left">
                        
                        <div class="gallery" id="links">
                             
                            <a class="gallery-item" href="assets/images/gallery/nature-1.jpg" title="Nature Image 1" data-gallery>
                                <div class="image">                              
                                    <img src="assets/images/gallery/nature-1.jpg" alt="Nature Image 1"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 1</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>

                            <a class="gallery-item" href="assets/images/gallery/music-1.jpg" title="Music picture 1" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/music-1.jpg" alt="Music picture 1"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Music picture 1</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>                            

                            <a class="gallery-item" href="assets/images/gallery/girls-1.jpg" title="Girls Image 1" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/girls-1.jpg" alt="Girls Image 1"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Girls image 1</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>

                            <a class="gallery-item" href="assets/images/gallery/nature-2.jpg" title="Nature Image 2" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-2.jpg" alt="Nature Image 2"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 2</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>

                            <a class="gallery-item" href="assets/images/gallery/space-1.jpg" title="Space picture 1" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/space-1.jpg" alt="Space picture 1"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Space picture 1</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>
                                                 
                            <a class="gallery-item" href="assets/images/gallery/music-2.jpg" title="Music picture 2" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/music-2.jpg" alt="Music picture 2"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Music picture 2</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>                            

                            <a class="gallery-item" href="assets/images/gallery/nature-3.jpg" title="Nature Image 3" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-3.jpg" alt="Nature Image 3"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 3</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                     

                            <a class="gallery-item" href="assets/images/gallery/girls-2.jpg" title="Girls Image 2" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/girls-2.jpg" alt="Girls Image 2"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Girls image 2</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                
                            
                            <a class="gallery-item" href="assets/images/gallery/space-2.jpg" title="Space picture 2" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/space-2.jpg" alt="Space picture 2"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Space picture 2</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>                               

                            <a class="gallery-item" href="assets/images/gallery/nature-4.jpg" title="Nature Image 4" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-4.jpg" alt="Nature Image 4"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 4</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                                 
                            
                            <a class="gallery-item" href="assets/images/gallery/music-3.jpg" title="Music picture 3" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/music-3.jpg" alt="Music picture 3"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Music picture 3</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>                            
                            
                            <a class="gallery-item" href="assets/images/gallery/nature-5.jpg" title="Nature Image 5" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-5.jpg" alt="Nature Image 5"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 5</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>
                            
                            <a class="gallery-item" href="assets/images/gallery/nature-6.jpg" title="Nature Image 6" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-6.jpg" alt="Nature Image 6"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 6</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                    
                             
                            <a class="gallery-item" href="assets/images/gallery/girls-3.jpg" title="Girls Image 3" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/girls-3.jpg" alt="Girls Image 3"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Girls image 3</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                      
                             
                            <a class="gallery-item" href="assets/images/gallery/nature-7.jpg" title="Nature Image 7" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-7.jpg" alt="Nature Image 7"/>
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 7</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                                                    
                            
                            <a class="gallery-item" href="assets/images/gallery/music-5.jpg" title="Music picture 5" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/music-5.jpg" alt="Music picture 5"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Music picture 5</strong>
                                    <span>Other description</span>
                                </div>                                
                            </a>

                            <a class="gallery-item" href="assets/images/gallery/nature-2.jpg" title="Nature Image 2" data-gallery>
                                <div class="image">
                                    <img src="assets/images/gallery/nature-2.jpg" alt="Nature Image 2"/>    
                                    <ul class="gallery-item-controls">
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>                                                                    
                                </div>
                                <div class="meta">
                                    <strong>Nature image 2</strong>
                                    <span>Description</span>
                                </div>                                
                            </a>                            
                             
                        </div>
                             
                       <!-- <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
                            <li class="disabled"><a href="#">«</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>                                    
                            <li><a href="#">»</a></li>
                        </ul>-->
                    </div>       
                    <!-- END CONTENT FRAME BODY -->
                
                </div>               
                <!-- END CONTENT FRAME -->
                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <!-- END BLUEIMP GALLERY -->
        
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
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
        <script type="text/javascript" src="js/plugins/dropzone/dropzone.min.js"></script>
        <script type="text/javascript" src="js/plugins/icheck/icheck.min.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <!--<script type="text/javascript" src="js/settings.js"></script>-->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->

        <script>            
            document.getElementById('links').onclick = function (event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                var link = target.src ? target.parentNode : target;
                var options = {index: link, event: event,onclosed: function(){
                        setTimeout(function(){
                            $("body").css("overflow","");
                        },200);                        
                    }};
                var links = this.getElementsByTagName('a');
                blueimp.Gallery(links, options);
            };
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