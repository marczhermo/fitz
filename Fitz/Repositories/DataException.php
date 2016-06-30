<?php namespace Fitz\Repositories;

use Fitz\Abstracts\DataObjectInterface;
use Fitz\Abstracts\Properties\DataExceptionTrait;

class DataException implements DataObjectInterface
{

    use DataExceptionTrait;

    public function __construct(\ErrorException $error)
    {
        $this->code = $error->getCode();
        $this->name = get_class($error);
        $this->line = $error->getLine();
        $this->file = $error->getFile();
        $this->message = $error->getMessage();
    }

    public function toArray()
    {
        return (array) $this;
    }
}