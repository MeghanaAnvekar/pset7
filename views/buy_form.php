<?php
   
    $c = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    foreach ($c as $d)
        $d[] = ["cash" => $c];
    $cash = number_format((double)$d["cash"],"4",'.',',');

 ?>

<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <b>CASH = $</b> <?= $cash ?>
            <br>
            <br>
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
         <div class="form-group">
            <input autocomplete="off"  class="form-control" name="shares" placeholder="Shares" type="number" min="1"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">Buy</button>
        </div>
    </fieldset>
</form>