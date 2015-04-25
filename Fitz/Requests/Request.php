<?php namespace Fitz\Requests;

use Fitz\Abstracts\Properties\RequestTrait;
use Fitz\Abstracts\RequestInterface;
use Fitz\Exceptions\Error404Exception;

class Request implements RequestInterface
{

    /**
     * class properties are defined using a trait for code re-usability
     * this makes it a contract for using traits in defining properties as a convention
     * you can still define your own properties after this but make use you the traits first.
     */
    use RequestTrait;

    public function __construct($url = null, $controllerPath = null)
    {
        $this->url = "//{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
        if ($url) {
            $this->url = $url;
        }

        $this->urlPath = parse_url($this->url, PHP_URL_PATH);
        $segments = explode('/', $this->urlPath);

        $this->nameOfClass = 'Home';
        if (isset($segments[1]) && $segments[1]) {
            $this->nameOfClass = $segments[1];
        }

        $this->methodOfClass = 'index';
        if (isset($segments[2]) && $segments[2]) {
            $this->methodOfClass = $segments[2];
        }

        $this->controllerPath = "Fitz\\Controllers\\";
        if ($controllerPath) {
            $this->controllerPath = $controllerPath;
        }

        if ( ! class_exists($this->controllerPath . $this->className())) {
            throw new Error404Exception('Page [' . $this->className() . '] not found');
        }
    }

    /**
     * @return string Name of the class
     */
    public function className()
    {
        return $this->nameOfClass;
    }

    /**
     * @return string method name of the class
     */
    public function methodName()
    {
        return $this->methodOfClass;
    }

    /**
     * @return $_GET sugar
     */
    public function getVars()
    {
        return $_GET;
    }

    /**
     * @return $_POST sugar
     */
    public function postVars()
    {
        return $_POST;
    }

    /**
     * gets the value from the $_GET array with key but always returns null if not set
     *
     * @param $key
     *
     * @return mixed or null
     */
    public function getVar($key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return null;
    }

    /**
     * gets the value from the $_POST array with key but always returns null if not set
     *
     * @param $key
     *
     * @return mixed
     */
    public function postVar($key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }

        return null;
    }

    /**
     * namespace path where the Controller folder is defined
     *
     * @param $path
     *
     * @return mixed
     */
    public function setControllerPath($path)
    {
        $this->controllerPath = $path;
    }

    public function getControllerPath()
    {
        return $this->controllerPath;
    }
}