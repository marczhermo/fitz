<?php namespace Fitz\Views;

use Fitz\Abstracts\BaseView;
use Fitz\Abstracts\ViewInterface;
use Fitz\Repositories\DataException;
use Fitz\Repositories\DataList;
use Fitz\Repositories\HeaderException;

class ViewException extends BaseView implements ViewInterface
{

    public function __construct(\ErrorException $error, $format = 'Json')
    {
        parent::__construct();
        $list = new DataList(array(new DataException($error)));
        $this->setList($list);
        $this->setHeader(new HeaderException($error));
        $this->setFormat($format);
    }

}