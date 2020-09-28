<?php

require ("entities/coffeeentity.php");

class coffeemodel {
    
            
    function getcoffeetypes(){
        require 'credentials.php';
        
        $con  = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM coffee") or die(mysqli_error($con));
        $types = array();
        
        while($row = mysqli_fetch_array($result)){
            array_push($types, $row[0]);
            
        }
        
        mysqli_close($con);
        return $types;
    }
    
    function getcoffeebytype($type){
        
        require'credentials.php' ;
        
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
         $sql = mysqli_select_db($con , $database);
         
         $query  = "SELECT * FROM coffee WHERE type LIKE '$type'";
         $result = mysqli_query($con,$query) or die(mysqli_error($con));
         $coffeearray = array();
         
         while($row = mysqli_fetch_array($result)){
             $name =  $row[1];
             $type = $row[2];
             $price = $row[3];
             $roast = $row[4];
             $country = $row[5];
             $image = $row[6];
             $review = $row[7];
             
             $coffee  =  new coffeeentity(-1,$name , $type,$price , $roast , $country, $image , $review);
             array_push($coffeearray, $coffee);
         }
         mysqli_close($con);
         return $coffeearray;
    
         }
         
       function GetCoffeeById($id) {
        require ('credentials.php');
        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql  = mysqli_select_db($con , $database);

        $query = "SELECT * FROM coffee WHERE id = $id";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];
            

            //Create coffee
            $coffee = new coffeeentity($id, $name, $type, $price, $roast, $country, $image, $review);
        }
        //Close connection and return result
        mysqli_close($con);
        return $coffee;
    }
    
     function InsertCoffee(coffeeentity $coffee) {
         
          require ('credentials.php');
          
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con, $database);

        $query = sprintf("INSERT INTO coffee
                          (name, type, price,roast,country,image,review)
                          VALUES
                          ('%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($con, $coffee->name),
                mysqli_real_escape_string($con, $coffee->type),
                mysqli_real_escape_string($con, $coffee->price),
                mysqli_real_escape_string($con, $coffee->roast),
                mysqli_real_escape_string($con, $coffee->country),
                mysqli_real_escape_string($con, "images/Coffee/" . $coffee->image),
                mysqli_real_escape_string($con, $coffee->review));
       // $this->PerformQuery($query);
        
        $result =  mysqli_query($con ,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }
    
     function UpdateCoffee($id, coffeeentity $coffee) {
         
         require ('credentials.php');
          
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con, $database);

        $query = sprintf("UPDATE coffee
                            SET name = '%s', type = '%s', price = '%s', roast = '%s',
                            country = '%s', image = '%s', review = '%s'
                          WHERE id = $id",
                mysqli_real_escape_string($con, $coffee->name),
                mysqli_real_escape_string($con, $coffee->type),
                mysqli_real_escape_string($con, $coffee->price),
                mysqli_real_escape_string($con, $coffee->roast),
                mysqli_real_escape_string($con, $coffee->country),
                mysqli_real_escape_string($con, "images/Coffee/" . $coffee->image),
                mysqli_real_escape_string($con, $coffee->review));
        
        $result =  mysqli_query($con ,$query) or die(mysqli_error($con));
        mysqli_close($con);
                          
       // $this->PerformQuery($query);
    }
    
    
    function DeleteCoffee($id) {
        
         require ('credentials.php');
          
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con, $database);
        
        $query = "DELETE FROM coffee WHERE id = $id";
        
        $result =  mysqli_query($con ,$query) or die(mysqli_error($con));
        mysqli_close($con);
       // $this->PerformQuery($query);
    }
    
    
    function PerformQuery($query) {
        require ('credentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con, $database);

        //Execute query and close connection
       $result =  mysqli_query($con ,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }
        
    }
    



