<table style="width:100% ;text-align: left" >

    <thead>
        <tr>
            <th>Date & Time</th>
            <th>Symbol</th>
            <th>Name</th>
            <th>Action</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>

<?php foreach ($positions as $position): ?>
   
    
        <tr>
            <td><?=$position["date"]?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?php $s = lookup($position["symbol"])?> <?= $s["name"] ?> </td>
            <td><?=$position["action"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td><?= $position["price"] ?></td>
            <td><?=  ($position["price"] * $position["shares"]) ?></td>
        </tr>
   
<?php endforeach ?>

    </tbody>

</table>