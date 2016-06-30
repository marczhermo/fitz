<?php namespace Fitz\Abstracts;

interface HttpHeaderInterface
{

    public function getCode();

    public function getStatus();

    public function setCode($code);

    public function setStatus($status);

}