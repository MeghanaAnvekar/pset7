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
            <td><?= $s["price"] ?></td>
            <td><?=  ($s["price"] * $position["shares"]) ?></td>
        </tr>
   
<?php endforeach ?>

    </tbody>

</table>
