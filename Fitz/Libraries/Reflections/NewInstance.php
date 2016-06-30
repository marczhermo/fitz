<?php namespace Fitz\Libraries\Reflections;

class NewInstance extends Inspector
{

    public static function create($classPath)
    {
        $inspector = new static($classPath);

        return $inspector->getInstance();
    }
}