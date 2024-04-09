<?php

namespace App\Models;

use PDO;

class Auction extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createAuction(int $productId, int $owner): void
    {
        $productId = $this->sql->real_escape_string($productId);
        $owner = $this->sql->real_escape_string($owner);
        $this->sql->query("INSERT INTO auction (product_id, owner) VALUES ($productId, $owner)");
    }
    public function getAll(): array
    {
        return $this->sql->query("
            SELECT a.id, a.latest_bid, u.email as 'owner', p.name as 'product', uo.email as 'won_by' FROM auction AS a
                INNER JOIN users AS u ON u.id = a.owner
                INNER JOIN products AS p ON p.id = a.product_id
                LEFT JOIN users AS uo ON uo.id = a.won_by
        ")->fetch_all(MYSQLI_ASSOC);
    }
}