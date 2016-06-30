<?php

namespace Fitz;

use Fitz\Markdown\Reader;
use Fitz\Markdown\Writer;

class Markdown
{
    public function __construct(Writer $writer)
    {
        // TODO: write logic here
    }

    public function toHtml($argument1)
    {
        return '<p>Hi, there</p>';
    }

    public function toHtmlFromReader(Reader $reader)
    {
        return '<p>Hi, there</p>';
    }

    public function outputHtml($argument1, Writer $writer)
    {
        return $writer->writeText('<p>Hi, there</p>');
    }

}
