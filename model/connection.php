<?php

class Connection
{
    public function connection () {
        $pdo = new pdo('mysql:host=localhost;dbname=textow', 'root', '');
        return $pdo;
    }
}