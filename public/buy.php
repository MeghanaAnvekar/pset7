<?php
    // configuration
    require("../includes/config.php"); 
    
     if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup($_POST["symbol"]);
        $cost = (float)$stock["price"] * $_POST["shares"];
        
        $d = CS50::query("SELECT cash FROM users WHERE id =?", $_SESSION["id"]);
        
        foreach ($d as $data)
            $data[] = ["cash" => $d];
        
        if($data["cash"] >= $cost)
        {
            $cash = $data["cash"] - $cost;
            
            $query = CS50::query("UPDATE users SET cash = ? WHERE id = ?", $cash, $_SESSION["id"]);
             
            
            CS50::query("INSERT INTO bought (user_id,symbol,shares) VALUES(?,?,?)", $_SESSION["id"],$_POST["symbol"],$_POST["shares"]);
            
            $rows = CS50::query("SELECT * FROM bought WHERE user_id = ?", $_SESSION["id"]);
            $positions = [];
            foreach ($rows as $row)
            {
                $stock = lookup($row["symbol"]);
                if ($stock !== false)
                {
                    $positions[] = [
                        "name" => $stock["name"],
                        "price" => $stock["price"],
                        "shares" => $row["shares"],
                        "symbol" => $row["symbol"]
                    ];
                }
            }
            // render portfolio
           render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);
        }
        else
        {
            apologize("You don't have enough cash!");
        }
    }
?>