<?php
     // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
             // else render form
            render("quote_form.php", ["title" => "Get Quote"]);
        }
    else
    {
        $stock = lookup($_POST["symbol"]);
        
        if($stock == false)
        {
            apologize("Symbol not found!.");
            
        }
        else
        {
            $stock["price"] = number_format ( (float) $stock["price"] , 4,'.',',');
            render("quote.php", ["name" => $stock["name"],"price" => $stock["price"]]);
            
        }
        
    }
    

?>