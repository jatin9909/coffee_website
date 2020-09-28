<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> <?php echo $title; ?> </title>
        <link rel =" stylesheet" type="text/css" href="styles/stylesheet.css"/>
    </head>
    <body>
        <div id="wrapper">
            <div id="banner">
                  <div class="centered">StarBucks Coffee</div>
            
            </div>
            
            <nav id="navigation">
                <ul id="nav">
                    
                    <li><a href="index.php">Home</a></li>
                    <li><a href="coffee.php">Coffee</a></li>
                    <li><a href="shops.php">Shop</a></li>
                    <li><a href="login.php">Login</a></li>
                     <li><a href="feedback.php">Feedback</a></li>
                    

                </ul>
             </nav>
            
            <div id="content_area">
                <?php echo $content; ?>
 
            </div>
            
            <div id="sidebar">
                
            </div>

            <footer>
            </footer>
 

    
         </div>
    
 
 

        
    </body>
</html>
