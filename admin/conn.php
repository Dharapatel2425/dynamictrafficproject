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
        <?php

            require_once 'Config.php';
            $conn=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
            if(!$conn){
                
                echo "<div class=\"error-code\"></div>";
                echo "<div class=\"error-text\">";
                    echo "Error: Unable to connect to MYSQL";   
                echo "</div>";
               
            }

        ?>
         
    </body>
</html>