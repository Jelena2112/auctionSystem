<?php

namespace App\Models;

class Bids extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function placeBid(int $auctionId, int $bidderId, int $amount): void
    {
        $auctionId = $this->sql->real_escape_string($auctionId);
        $bidderId = $this->sql->real_escape_string($bidderId);

        $this->sql->query("INSERT INTO bids (auction_id, amount, user_id) VALUES ($auctionId, $amount, $bidderId) ");
        $this->sql->query("UPDATE auction SET latest_bid=$amount WHERE id=$auctionId");
    }
}