<?php

namespace App;

class Julian {
    public static function capitalize($text)
    {
        return ucwords(strtolower($text));
    }

    public static function sentence($text)
    {
        return ucfirst(strtolower($text));
    }

    public static function upper($text)
    {
        return strtoupper($text);
    }
}
