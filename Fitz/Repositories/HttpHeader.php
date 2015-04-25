<?php namespace Fitz\Repositories;

use Fitz\Abstracts\HttpHeaderInterface;
use Fitz\Abstracts\Properties\HttpHeaderTrait;

class HttpHeader implements HttpHeaderInterface
{

    use HttpHeaderTrait;

    public function __construct($code = 200, $status = 'OK')
    {
        $this->code = $code;
        $this->status = $status;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}