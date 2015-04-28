<?php
/**
 * Fitz Micro PHP Framework
 * @author: Marcz <marcz@lab1521.com>
 * @copyright 2015-2016 Lab1521 Ltd.
 * @license MIT
 */
namespace Fitz\Libraries\Reflections;

class Inspector extends \ReflectionClass
{
    protected $method;

    public function __construct($className = '')
    {
        if ($className) $this->inspect($className);
    }

    public function currentMethod()
    {
        return $this->method;
    }

    public function inspect($className)
    {
        parent::__construct($className);

        $this->method = $this->getConstructor();
    }
}
