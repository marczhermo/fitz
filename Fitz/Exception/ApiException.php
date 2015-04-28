<?php namespace Fitz\Exception;

class ApiException extends \ErrorException
{
    public function __construct($message, $code = 400)
    {
        parent::__construct($message, $code);
    }
}