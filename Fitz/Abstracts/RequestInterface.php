<?php namespace Fitz\Abstracts;

interface RequestInterface
{

    /**
     * Name of the class
     * @return string
     */
    public function className();

    /**
     * method name of the class
     * @return string
     */
    public function methodName();

    /**
     * @return $_GET sugar
     */
    public function getVars();

    /**
     * @return $_POST sugar
     */
    public function postVars();

    /**
     * gets the value from the $_GET array with key but always returns null if not set
     *
     * @param $key
     *
     * @return mixed or null
     */
    public function getVar($key);

    /**
     * gets the value from the $_POST array with key but always returns null if not set
     *
     * @param $key
     *
     * @return mixed
     */
    public function postVar($key);

    /**
     * namespace path where the Controller folder is defined
     *
     * @param $path
     *
     * @return mixed
     */
    public function setControllerPath($path);

    public function getControllerPath();

}