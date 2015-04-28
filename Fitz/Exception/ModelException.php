<?php namespace Fitz\Exception;

class ModelException extends ApiException
{

    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }
}