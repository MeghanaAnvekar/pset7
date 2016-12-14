<table style="width:100% ;text-align: left" >

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Total</th>
            
        </tr>
    </thead>

    <tbody>

<?php foreach ($positions as $position): ?>
   
    
        <tr>
            <td><?= $position["symbol"] ?></td>
            <td><?php $s = lookup($position["symbol"])?> <?= $s["name"] ?> </td>
            <td><?= $position["shares"] ?></td>
            <td><?= $position["price"] ?></td>
            <td><?=  ($position["price"] * $position["shares"]) ?></td>
        </tr>
   
<?php endforeach ?>

    </tbody>

</table>

<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">Sell</button>
        </div>
    </fieldset>
</form>