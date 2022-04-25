<?php

function connect_db()
{
    return new PDO("mysql:host=127.0.0.1;dbname=my_shop;port=3306;charset=UTF8", "user", "password");
}

$db = connect_db();
