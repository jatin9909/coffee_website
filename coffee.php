<?php

require 'controller/coffeecontroller.php';
$coffeeController = new coffeecontroller();

if(isset($_POST['types']))
{
    //Fill page with coffees of the selected type
    $coffeeTables = $coffeeController->CreateCoffeeTables($_POST['types']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $coffeeTables = $coffeeController->CreateCoffeeTables('%');
}

//Output page data
$title = 'Coffee overview';
$content = $coffeeController->CreateCoffeeDropdownList(). $coffeeTables;

include 'template.php';



