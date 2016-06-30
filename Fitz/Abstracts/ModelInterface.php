<?php namespace Fitz\Abstracts;

interface ModelInterface
{

    public function query($sql);

    public function fetchArray($sql);
}