<?php

    // configuration
    require("../includes/config.php"); 
    
  if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
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
    
    
        render("sell_form.php", ["positions" => $positions, "title" => "Sell"]); 
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")   
    {
        $data = lookup($_POST["symbol"]);
         
        if($data === false)
        {
            apologize("Symbol not found!.");
            
        }
        else
        {
             
             $d = CS50::query("SELECT shares FROM bought WHERE (symbol = ?) AND (user_id =?)", $_POST["symbol"], $_SESSION["id"]);
            
            if( $d ==false)
            {
                apologize("You don't own share(s) from that company. ");
                
            }
            else
            {
               
                $positions=[];
                $positions = CS50::query("SELECT * FROM bought WHERE (symbol = ?) AND (user_id = ?)",$_POST["symbol"], $_SESSION["id"]);
                
                $q = CS50::query("DELETE FROM bought WHERE (symbol = ?) AND (user_id = ?)",$_POST["symbol"],$_SESSION["id"]);
            
                
                if($q === false)
                {
                    apologize("Couldn't sell the share you selected!");
                }
                else
                {
                    
                    foreach ($d as $a)
                         $a[] = ["shares" => $d];
;                    
                    CS50::query("UPDATE users SET cash = (cash + ?) WHERE id = ?",((float)$a["shares"] * (float)$data["price"]),$_SESSION["id"]);
                    
                    CS50::query("INSERT INTO history (user_id,symbol,shares,action,price,date_time) VALUES(?,?,?,?,?,?)", $_SESSION["id"],$_POST["symbol"],$a["shares"],"sold",$data["price"],date("Y-m-d H:i:s", $current_timestamp = time()));
                   
                    render("sold.php", ["positions" => $positions, "title" => "Sold"]);
                }
            }
        }
        
        
    }
    
 
    
?>