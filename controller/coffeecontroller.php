<?php

require ("model/coffeemodel.php");

//Contains non-database related function for the Coffee page
class coffeecontroller {

    function CreateCoffeeDropdownList() {
        $coffeeModel = new coffeemodel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($coffeeModel->getcoffeetypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
    function CreateCoffeeTables($types)
    {
        $coffeeModel = new coffeemodel();
        $coffeeArray = $coffeeModel->getcoffeebytype($types);
        $result = "";
        
        //Generate a coffeeTable for each coffeeEntity in array
        foreach ($coffeeArray as $key => $coffee) 
        {
            $result = $result .
                    "<table class = 'coffeeTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$coffee->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$coffee->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$coffee->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$coffee->price</td>
                        </tr>
                        
                        <tr>
                            <th>Roast: </th>
                            <td>$coffee->roast</td>
                        </tr>
                        
                        <tr>
                            <th>Origin: </th>
                            <td>$coffee->country</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$coffee->review</td>
                        </tr>                      
                     </table>";
        }        
        return $result;
        
    }
    
    function GetImages() {
        //Select folder to scan
        $handle = opendir("images/Coffee");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }
    
    function InsertCoffee() {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];

        $coffee = new coffeeentity(-1, $name, $type, $price, $roast, $country, $image, $review);
        $coffeeModel = new coffeemodel();
        $coffeeModel->InsertCoffee($coffee);
    }
    
      function UpdateCoffee($id) {
        
    }

    function DeleteCoffee($id) {
        
    }
    
     function GetCoffeeById($id) {
        $coffeeModel = new coffeemodel();
        return $coffeeModel->GetCoffeeById($id);
    }

    function GetCoffeeByType($type) {
        $coffeeModel = new coffeemodel();
        return $coffeeModel->GetCoffeeByType($type);
    }

    function GetCoffeeTypes() {
        $coffeeModel = new coffeemodel();
        return $coffeeModel->GetCoffeeTypes();
    }
    
    
    
    

}

