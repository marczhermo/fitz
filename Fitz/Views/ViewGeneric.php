<?php namespace Fitz\Views;

use Fitz\Abstracts\BaseView;
use Fitz\Abstracts\ViewInterface;
use Fitz\Repositories\DataList;
use Fitz\Repositories\HttpHeader;

class ViewGeneric extends BaseView implements ViewInterface
{

    public function __construct(DataList $dataList, $format = 'Json')
    {
        parent::__construct();
        $this->setList($dataList);
        $this->setHeader(new HttpHeader);
        $this->setFormat($format);
    }

}