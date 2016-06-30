<?php

namespace spec\Fitz;

use Fitz\Markdown\Reader;
use Fitz\Markdown\Writer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarkdownSpec extends ObjectBehavior
{
    /*
    function let(Writer $writer)
    {
        $this->beConstructedWith($writer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Fitz\Markdown');
    }

    function it_converts_plain_text_to_html_paragraphs()
    {
        $this->toHtml('Hi, there')->shouldReturn('<p>Hi, there</p>');
    }

    function it_converts_text_from_an_external_source(Reader $reader)
    {
        //STUBS - creating other fake objects by writing interfaces first
        //Just use type hint Reader $reader and use Fits\Markdown\Reader to create doubles
        //$reader->beADoubleOf('Fitz\Markdown\Reader');
        $reader->getMarkdown()->willReturn("Hi, there");
        $this->toHtmlFromReader($reader)->shouldReturn('<p>Hi, there</p>');
    }

    function it_outputs_converted_text(Writer $writer)
    {
        $this->outputHtml('Hi, there', $writer);

        //Mocks and Spies is one of style

        //MOCKS - say what should happen beforehand
        $writer->writeText('<p>Hi, there</p>')->shouldHaveBeenCalled();
        //SPIES - say what should have happened afterwards
        $writer->writeText('<p>Hi, there</p>')->shouldBeCalled();
    }
    */
}
