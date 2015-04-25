<?php namespace Fitz\Configs;

use Fitz\Libraries\Reflections\Inspector;

class Autoload
{

    public function __construct()
    {
        foreach (ClassPaths::Classes() as $key => $classPath) {
            ClassPaths::setInstance($key, new Inspector($classPath));
        }
    }

    public static function make()
    {
        return new static();
    }

}