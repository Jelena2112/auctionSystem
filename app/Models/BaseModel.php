<?php

namespace App\Models;

use mysqli;

class BaseModel
{
    private readonly mysqli $sql;
    public function __construct()
    {
        $this->sql = mysqli_connect(
            hostname: $_ENV['hostname'],
            username: $_ENV['username'],
            password: $_ENV['password'],
            database: $_ENV['database'],
        );
    }

    public function getConnection()
    {
        return $this->sql;
    }
}