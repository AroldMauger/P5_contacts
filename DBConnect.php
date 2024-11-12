<?php

class DBConnect
{
    public static function getPDO() {
        return new PDO('mysql:dbname=contact;host=localhost;port=3306', 'root', '');
    }
}