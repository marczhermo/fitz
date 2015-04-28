<?php

namespace spec\Fitz\Config;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigClassSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Fitz\Config\ConfigClass');
    }

    function it_returns_an_array_of_objects()
    {
        self::Objects()->shouldBeArray();
    }

    function it_returns_an_array_of_classes()
    {
        self::Classes()->shouldBeArray();
    }

    function it_returns_an_array_of_abstracts()
    {
        self::Abstracts()->shouldBeArray();
    }

    function it_returns_an_array_of_filters()
    {
        self::Filters()->shouldBeArray();
    }

    function it_returns_an_array_of_events()
    {
        self::Events()->shouldBeArray();
    }
}
