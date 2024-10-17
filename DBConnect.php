<?php

class DBConnect
{
    public static function getPDO() {
        return new PDO('mysql:dbname=database;host=localhost;port=3307', 'user', 'password');
    }
}