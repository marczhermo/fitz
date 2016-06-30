<?php

namespace Fitz\Config;

class ConfigClass
{

    use ConfigClassTrait;

    public static function Classes()
    {
        return self::$classes = [];
    }

    public static function Abstracts()
    {
        return self::$abstracts = [];
    }

    public static function Filters()
    {
        return self::$filters = [];
    }

    public function Events()
    {
        return self::$events = [];
    }
}
