<?php

namespace App\Models;


use mysqli;

class User extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function userExists(string $email): bool
    {
        $email = $this->sql->real_escape_string($email);
        $response = $this->sql->query("SELECT id FROM users WHERE email='$email' LIMIT 1");
        return $response->num_rows >= 1;
    }
    public function register(string $email, string $password): void
    {
        $password = password_hash(password: $password,algo: PASSWORD_DEFAULT);
        $email = $this->sql->real_escape_string($email);
        $password = $this->sql->real_escape_string($password);
        $this->sql->query("INSERT INTO users (email, password) VALUES ('$email', '$password')");
    }
}