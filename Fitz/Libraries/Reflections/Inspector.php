<?php namespace Fitz\Libraries\Reflections;

use Fitz\Abstracts\Properties\InspectorTrait;
use Fitz\Configs\ClassPaths;
use Fitz\Exceptions\ApiException;

class Inspector extends \ReflectionClass
{
    use InspectorTrait;

    /**
     * Name of the class
     *
     * @param null $className
     */
    public function __construct($className = null)
    {
        if ($className) {
            $this->inspect($className);
        }
    }

    /**
     * Name of the class, use the class constructor as default method and get its arguments
     *
     * @param $className
     */
    public function inspect($className)
    {
        parent::__construct($className);

        $this->method = $this->getConstructor();
    }

    /**
     * Instantiates the class using Reflection API
     * @return object
     * @throws ApiException
     */
    public function getInstance()
    {
        if ( ! $this->name) {
            throw new ApiException('Reflection Class needs 1 argument given.');
        }

        if (is_null($this->method)) {
            return $this->newInstance();
        }

        $params = $this->getArgumentsArray($this->method);

        return $this->newInstanceArgs($params);
    }

    /**
     * Get all arguments for a given method
     *
     * @param \ReflectionMethod $method
     *
     * @return array
     */
    public function getArgumentsArray(\ReflectionMethod $method)
    {
        $parameters = $method->getParameters();
        $arguments = array();

        foreach ($parameters as $paramObject) {
            $arguments[] = $this->getParameterValue($paramObject);
        }

        return $arguments;
    }

    /**
     * @param $paramObject
     *
     * @return mixed|null
     * @throws ApiException
     */
    public function getParameterValue(\ReflectionParameter $paramObject)
    {
        $currentClass = $paramObject->getClass();

        if (is_null($currentClass)) {
            return $this->getPropertyDefaultValue($paramObject);
        }

        return $this->getInstantiatedClass($paramObject);
    }

    /**
     * @param \ReflectionParameter $paramObject
     *
     * @return mixed|null
     */
    public function getPropertyDefaultValue(\ReflectionParameter $paramObject)
    {
        if ($paramObject->isOptional()) {
            return $paramObject->getDefaultValue();
        }

        if ($paramObject->isDefaultValueConstant()) {
            return constant($paramObject->getDefaultValueConstantName());
        }

        return null;
    }

    /**
     * @param \ReflectionParameter $paramObject
     *
     * @return mixed
     * @throws ApiException
     */
    public function getInstantiatedClass(\ReflectionParameter $paramObject)
    {
        $currentClass = $paramObject->getClass();

        $requiredClass = ClassPaths::searchInterface($currentClass->name);

        if ($currentClass->IsInstantiable()) {
            $requiredClass = ClassPaths::searchClass($currentClass->name);
        }

        return ClassPaths::getInstance($requiredClass);
    }

