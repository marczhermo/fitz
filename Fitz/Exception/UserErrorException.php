<?php namespace Fitz\Exception;

class UserErrorException extends ApiException
{

    public function __construct($message, $code = 401)
    {
        parent::__construct($message, $code);
    }
}
