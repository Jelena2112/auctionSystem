<?php

namespace App\Models;

use mysqli;

class BaseModel
{
    protected readonly mysqli $sql;
    public function __construct()
    {
        $this->sql = mysqli_connect(
            hostname: $_ENV['DB_HOSTNAME'],
            username: $_ENV['DB_USER'],
            password: $_ENV['DB_PASSWORD'],
            database: $_ENV['DB_DATABASE'],
        );
    }
}