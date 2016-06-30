<?php namespace Fitz\Abstracts;

use Fitz\Abstracts\Properties\CollectionTrait;

abstract class DataCollection implements \IteratorAggregate, \Countable
{

    use CollectionTrait;

}