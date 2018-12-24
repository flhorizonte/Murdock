<?php

namespace App\config;

class Config
{
    public static $config;

    public static function gen()
    {
        if(empty(self::$config)) {

            self::$config = json_decode(file_get_contents('./config.json'), true)['config'];
        }

        return self::$config;
    }
}

$_SESSION = Config::gen()['sessionUsers'];

//array_push($_SESSION[], 1);

var_dump($_SESSION);