<?php namespace Fitz\Exceptions;

class Error5xxException extends ApiException
{

    public function __construct($message, $code = 500)
    {
        parent::__construct($message, $code);
    }
}
