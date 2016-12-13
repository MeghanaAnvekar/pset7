
 <table style="width:100% ;text-align: left" >

    <thead>
        <tr>
            <th colspan = "2">Symbol</th>
            <th colspan = "2">Name</th>
            <th colspan = "2">Shares</th>
            <th colspan = "2">Price</th>
            <th colspan = "2">Total</th>
        </tr>
    </thead>

    <tbody>

<?php foreach ($positions as $position): ?>
   
    
        <tr>
            <td colspan = "2"><?= $position["symbol"] ?></td>
            <td colspan = "2"><?php $s = lookup($position["symbol"])?> <?= $s["name"] ?> </td>
            <td colspan = "2"><?= $position["shares"] ?></td>
            <td colspan = "2"><?= $position["price"] ?></td>
            <td colspan = "2"><?=  ($position["price"] * $position["shares"]) ?></td>
        </tr>
   
<?php endforeach ?>

    </tbody>

</table>