<?php
/**
 * Fitz Micro PHP Framework
 * @author: Marcz <marcz@lab1521.com>
 * @copyright 2015-2016 Lab1521 Ltd.
 * @license MIT
 */
namespace Fitz\Config;

trait ConfigClassTrait {

    /**
     * List of all instantiated objects
     * @var array
     */
    protected static $instances = [];

    /**
     * List all references to classes that will be autoloaded for convenience
     * @var array
     */
    protected static $classes = [];

    /**
     * List all references to abstracts or interfaces relating to $objects property
     * @var array
     */
    protected static $abstracts = [];

    /**
     * List of filters used before executing the controller method
     * @var array
     */
    protected static $filters = [];

    /**
     * List of events which feeds upon executing the controller method
     * @var array
     */
    protected static $events = [];

    /**
     * List of all instantiated objects
     * @return array
     */
    public static function Objects()
    {
        return self::$instances = [];
    }

}