<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$host="localhost";
$user="root";
$password="";
$db="demo";
 
$con = mysqli_connect($host,$user,$password) or  die(mysqli_error($con));
$sql = mysqli_select_db($con , $db);
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $query="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=  mysqli_query($con , $query);
    
    if(mysqli_num_rows($result)==1){
        
        header("Refresh: 5; url=index.php");
        echo " <div align='center'> <font color ='white'> <h1>   Welcome '" . $uname . "'</h1> </font> </div> "    ;
        
        
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
        <link rel =" stylesheet" type="text/css" href="styles/login.css"/>
	
</head>
<body>
	<div class="container">
	<img src="images/login1.jpg"/>
        <form method="POST" action="#">
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div>
</body>
</html>
