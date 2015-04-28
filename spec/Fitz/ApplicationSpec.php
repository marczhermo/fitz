<?php

namespace spec\Fitz;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function let($path)
    {
        $this->beConstructedWith($path);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Fitz\Application');
    }

    function it_contains_a_server_method()
    {
        $this->server();
    }
}
