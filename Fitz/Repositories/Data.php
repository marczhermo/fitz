<?php namespace Fitz\Repositories;

use Fitz\Abstracts\DataObjectInterface;

class Data implements DataObjectInterface
{

    public function toArray()
    {
        return (array) $this;
    }
}