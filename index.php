<?php

use App\Models\User;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//$auctionModel = new \App\Models\Auction();
//
//
//for($i = 0; $i < 20; $i++) {
//    $auctionModel->createAuction(
//        productId: rand(1,5),
//        owner: rand(1,2)
//    );
//}
