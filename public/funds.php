<?php
     // configuration
    require("../includes/config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
             // else render form
            render("funds_form.php", ["title" => "Add Funds"]);
        }
    else
    {
        if((float)$_POST["cash"] < 0)
        {
            apologize("Amount can't be negative.");
        }
        else
        {
            CS50::query("UPDATE users SET cash = (cash + ?) WHERE id = ?",(float)$_POST["cash"],$_SESSION["id"]);
            render("funds_view.php" ,["title" => "Cash"]);
        }
    }
    

?>