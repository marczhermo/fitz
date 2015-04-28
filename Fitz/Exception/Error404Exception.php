<?php namespace Fitz\Exception;

class Error404Exception extends ApiException
{

    public function __construct($message = 'Page not found', $code = 404)
    {
        parent::__construct($message, $code);
    }
}
