<?php namespace Fitz\Repositories;

class HeaderException extends HttpHeader
{

    public function __construct(\ErrorException $error)
    {
        $this->setCode($error->getCode());
        $this->setStatus(($error->getMessage()));
    }
}