<?php namespace Fitz\Abstracts;

use Fitz\Repositories\DataList;

abstract class BaseController
{

    protected function view($data)
    {
        return new DataList($data);
    }

    protected function redirect($url, $data)
    {
        $dataList = new DataList($data);
        $dataList->push('redirect', $url);

        return $dataList;
    }

}