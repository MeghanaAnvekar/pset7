<?php
   
    $c = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    foreach ($c as $d)
        $d[] = ["cash" => $c];
    $cash = number_format((double)$d["cash"],"4",'.',',');

 ?>

<form action="funds.php" method="post">
    <fieldset>
        <div class="form-group">
            <b>CASH = $</b> <?= $cash ?>
            <br>
            <br>
            <input autocomplete="off" autofocus class="form-control" name="cash" placeholder="$0.00" type="text"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">Add</button>
        </div>
    </fieldset>
</form>