<?php namespace Fitz\Abstracts;

use Fitz\Abstracts\Properties\ViewTrait;
use Fitz\Exceptions\ApiException;
use Fitz\Repositories\DataList;
use Fitz\Repositories\HttpHeader;

abstract class BaseView
{

    /**
     * Properties were defined using traits for reusable components
     * A convention similar to using interfaces as contracts for methods
     */
    use ViewTrait;

    public function __construct()
    {
        //ob_end_clean();
    }

    public function setFormat($format)
    {
        $this->format = $format;
        if (isset($_GET['format'])) {
            $this->format = ucfirst($_GET['format']);
        }
    }

    public function render()
    {
        $formatterClass = "Fitz\\Views\\Formatter\\" . $this->format . "Formatter";

        if ( ! class_exists($formatterClass)) {
            throw new ApiException('Formatter class not found.');
        }

        $formatter = new $formatterClass($this);
        call_user_func(array($formatter, 'write'));
    }

    public function setList(DataList $list)
    {
        $this->list = $list;
    }

    public function setHeader(HttpHeader $header)
    {
        $this->header = $header;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getList()
    {
        return $this->list;
    }

    public function getFormat()
    {
        return $this->format;
    }
}