<?php

require_once 'conn.php';

//check if form is submitted
//if(isset($_POST['submit'])){
    if (isset($_POST['login'])) 
    {

        $EmailId = mysqli_real_escape_string($conn, $_POST['EmailId']);
        $Pass= mysqli_real_escape_string($conn, $_POST['Pass']);
      
        if(mysqli_connect_errno())
        {
            echo "Connection failed ";
            exit();
        }
        if($EmailId ==' ' && $Pass ==' '){

            $msg="Field Must not be empty...!!!";
            header("Location: login.php?er=1");
            
        }
        else
        {
            if($EmailId =='admin' && $Pass =='1234')
            {
                    session_start();
                  //$_SESSION['username']=$POST['username'];
                    $_SESSION['username']="admin";
                    header("Location: index.php");
                    if(isset($_SESSION['username']))
                        header('Location: index.php');
                    else 
                        header('Location: login.php?er=4');
            }
            else
            {
                    $msg="Username or password are wrong...!!!";
                    header("Location: login.php?er=2");
            }
            
        }

    }
/*}else {
    $msg="You have to must Logged in...!!!";
    header('Location: login.php?error=1');
}*/
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
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
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="EmailId" value="UserName" required="required" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'UserName:';}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                             <input type="password" class="form-control" name="Pass" value="Password" required="required" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'UserName:';}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type="submit" name="login" id="login" value="Login to your account">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="login-footer" >
                    <?php
                        if(!empty($_GET['er'])){
                            if(($_GET['er'])==1)
                                printf("<br/><b><center style=\"color:#000;\">Field Must not be empty...!!!</center></b>");
                            elseif(($_GET['er'])==2)
                                printf("<br/><b><center style=\"color:#000;\">Username or password are wrong...!!!<center/></b>");
                            elseif(($_GET['er'])==3)
                                printf("<br/><b><center style=\"color:#000;\">You are Successfully logged out...!!!</center></b>");
                            elseif(($_GET['er'])==4)
                                printf("<br/><b><center style=\"color:#000;\">You have to must logged in..!!!</center></b>");
                        }
                    ?> 
                </div>

                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 Dynamic Traffic Management
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>