<?php namespace Fitz\Abstracts;

use Fitz\Abstracts\Properties\FilterTrait;

abstract class FilterAbstract
{

    use FilterTrait;

    public function succeedWith(FilterAbstract $filterObject)
    {
        $this->nextFilterObject = $filterObject;
    }

    public abstract function check();

    public function next()
    {
        if ($this->nextFilterObject) {
            $this->nextFilterObject->check();
        }
    }

}