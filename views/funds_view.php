<?php
   
    $c = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    foreach ($c as $d)
        $d[] = ["cash" => $c];
    $cash = number_format((double)$d["cash"],"4",'.',',');

 ?>
    <div class="form-group">
        <b>CASH = $</b> <?= $cash ?>
            
    </div>