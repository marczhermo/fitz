<?php namespace Fitz\Views\Formatter;

use Fitz\Abstracts\Formatter;
use Fitz\Abstracts\Properties\FormatterTrait;
use Fitz\Abstracts\ViewInterface;

class JsonFormatter implements Formatter
{

    use FormatterTrait;

    public function __construct(ViewInterface $view)
    {
        $this->view = $view;
    }

    public function write()
    {
        $list = $this->view->getList();
        $header = $this->view->getHeader();

        $jsonObject = new \stdClass();

        if ($header->getCode() < 100) {
            $header->setCode(400);
        }

        $statusCode = $header->getCode();

        if ($statusCode < 200 || $statusCode > 299) {
            $jsonObject->error = $statusCode;
        }

        $jsonObject->data = $list->toArray();

        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($jsonObject);
        exit;
    }

}