<?php
      // configuration
    require("../includes/config.php"); 
    
    $rows = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $row["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "action" => $row["action"],
                "date" =>$row["date_time"]
            ];
        }
    }
    // render portfolio
   render("history_view.php", ["positions" => $positions, "title" => "History"]);
?>