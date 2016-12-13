<?php

    // configuration
    require("../includes/config.php"); 
    $user = CS50::query("SELECT * FROM users WHERE id = ?",$_SESSION["id"]);
    $rows = CS50::query("SELECT symbol, shares FROM bought WHERE user_id= ?",$user["id"]) ;
    
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

?>
