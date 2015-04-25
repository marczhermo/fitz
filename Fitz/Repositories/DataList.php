<?php namespace Fitz\Repositories;

use Fitz\Abstracts\DataCollection;

class DataList extends DataCollection
{

    function __construct(array $collection)
    {
        $this->collection = $collection;
    }

}