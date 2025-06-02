<?php

namespace App\Model;

use PDO;

class Connection
{
    public function connection () {
        $pdo = new pdo('mysql:host=localhost;dbname=login', 'root', '');
        return $pdo;
    }
}