<?php
/**
 * Fitz Micro PHP Framework
 * @author: Marcz <marcz@lab1521.com>
 * @copyright 2015-2016 Lab1521 Ltd.
 * @license MIT
 */
namespace spec\Fitz\Libraries\Reflections;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InspectorSpec extends ObjectBehavior
{
    function let($className)
    {
        $this->beConstructedWith($className);
        $this->shouldHaveType('\ReflectionClass');
        $this->currentMethod()->shouldHaveType('\ReflectionMethod');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Fitz\Libraries\Reflections\Inspector');
    }

    function it_inspects_given_class_name_without_constructor()
    {
        $this->inspect('Fitz\Config\ConfigClass');
        $this->getName()->shouldBe('Fitz\Config\ConfigClass');
        $this->getShortName()->shouldBe('ConfigClass');
        $this->currentMethod()->shouldBe(null);
    }

    function it_inspects_given_class_name_with_constructor()
    {
        $this->inspect('Fitz\Application');
        $this->getName()->shouldBe('Fitz\Application');
        $this->getShortName()->shouldBe('Application');
        $this->currentMethod()->shouldReturnAnInstanceOf('\ReflectionMethod');
    }
}
