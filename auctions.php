<?php

use App\Models\Auction;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$auctionModel = new Auction();
?>


<!DOCTYPE HTML>

<html lang="en">

    <head>
        <title>Draganov bidding sistem</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Owner</th>
                    <th>Latest bid</th>
                    <th>Won by</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($auctionModel->getAll() as $auction): ?>
                    <tr>
                        <td><?= $auction['product'] ?></td>
                        <td><?= $auction['owner'] ?></td>
                        <td><?= $auction['latest_bid'] ?></td>
                        <td><?= $auction['won_by'] ?></td>
                        <td><a href="bid.php?auctionId=<?= $auction['id'] ?>">Bid</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>
