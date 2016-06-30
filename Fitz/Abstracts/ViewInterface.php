<?php namespace Fitz\Abstracts;

use Fitz\Repositories\DataList;

interface ViewInterface
{

    public function setList(DataList $list);

    public function render();

    public function getHeader();

    public function getList();

    public function getFormat();

}