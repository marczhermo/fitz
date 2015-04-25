<?php namespace Fitz\Abstracts\Properties;

trait CollectionTrait
{

    protected $collection = array();

    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    public function count()
    {
        return count($this->collection);
    }

    public function toArray()
    {
        return $this->collection;
    }

    function push($key, $value)
    {
        $this->collection[$key] = $value;
    }
}