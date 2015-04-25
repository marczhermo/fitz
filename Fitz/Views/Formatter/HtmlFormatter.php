<?php namespace Fitz\Views\Formatter;

use Fitz\Abstracts\Formatter;
use Fitz\Abstracts\Properties\FormatterTrait;
use Fitz\Abstracts\ViewInterface;

class HtmlFormatter implements Formatter
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

        if ($header->getCode() < 100) {
            $header->setCode(400);
        }

        $statusCode = $header->getCode();


        $errorHtml = null;
        if ($statusCode < 200 || $statusCode > 299) {
            $errorHtml = '<h3>' . $statusCode . ' - ' . $header->getStatus() . '</h3>';
        }

        $tableRows = $list->toArray();

        http_response_code($header->getCode());
        echo '<html><body>';

        if ($errorHtml) {
            echo $errorHtml;
        }

        $isRowHead = false;
        echo '<table border="1">';
        foreach ($tableRows as $row) {
            if ( ! $isRowHead) {
                echo '<tr><th>';
                echo implode('</th><th>', array_keys((array) $row));
                echo "</th></tr>\n";
                $isRowHead = true;
            }
            echo '<tr><td>';
            echo implode('</td><td>', (array) $row);
            echo "</td></tr>\n";
        }
        echo '</table></body></html>';
        exit;
    }

}