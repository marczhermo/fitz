<?php namespace Fitz\Abstracts\Properties;

trait RequestTrait
{

    /**
     * URL to be evaluated
     * @var string
     */
    protected $url;

    /**
     * parse_url() return value with PHP_URL_PATH argument
     * @var
     */
    protected $urlPath;

    /**
     * Controller folder path as defined by the namespace
     * @var string
     */
    protected $controllerPath;

    /**
     * Name of the controller class intended to instantiate
     * @var
     */
    protected $nameOfClass;

    /**
     * Name of the class method intended to run
     * @var
     */
    protected $methodOfClass;

}