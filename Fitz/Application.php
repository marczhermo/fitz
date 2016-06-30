<?php namespace Fitz;

use Fitz\Abstracts\RequestInterface;
use Fitz\Configs\Autoload;
use Fitz\Configs\ClassPaths;
use Fitz\Exceptions\Error404Exception;
use Fitz\Libraries\Reflections\NewInstance;
use Fitz\Views\ViewException;
use Fitz\Views\ViewGeneric;

/**
 * Class Application
 * @package Fitz
 */
class Application
{

    /**
     * Setup functions for error handling and runs application blueprint
     * Used output buffering for aiding the capture of fatal errors
     * This will in turn throw an exception in Json format
     * register_shutdown_function is used to retrieve fatal errors before PHP exits
     * Don't like output buffering?
     * Just comment ob_start(), ob_end_flush() here and ob_end_clean() in BaseView.php
     * And comment register_shutdown_function in setupErrorHandlers() method
     * @throws Error404Exception
     */
    public function __construct()
    {
        //ob_start();
        $this->setupErrorHandlers();
        $this->run();
        //ob_end_flush();
    }

    /**
     * Runs and framework blueprint
     * Instantiates needed application classes
     * Checks the URL and runs Filter objects
     * Use Reflection API to instantiate objects with dependencies
     * Outputs data using Json as default format
     * To output html format use append ?format=html in URL
     * @throws Error404Exception
     * @throws Exceptions\ApiException
     */
    public function run()
    {
        Autoload::make();

        $request = ClassPaths::getInstance('Request');

        $inspector = ClassPaths::getInstance('Inspector');
        $inspector->inspect($request->getControllerPath() . $request->className());

        $home = $inspector->getInstance();

        if ( ! $inspector->hasMethod($request->methodName())) {
            throw new Error404Exception();
        }

        $method = $inspector->getMethod($request->methodName());

        if ( ! $method->isPublic()) {
            throw new Error404Exception();
        }

        $this->executeFilters($request);

        $methodParameters = $inspector->getArgumentsArray($method);
        $data = $method->invokeArgs($home, $methodParameters);

        $output = new ViewGeneric($data);
        $output->render();
    }


    /**
     * Called by set_error_handler and register_shutdown_function
     * Errors where intercepted by above functions
     * Displays errors in Json format
     * @return bool
     */
    public function errorHandler()
    {
        $hasError = false;
        $error = error_get_last();
        if ($error['type'] === E_ERROR) {
            $errorNumber = $error['type'];
            $errorMessage = $error['message'];
            $errorFile = $error['file'];
            $errorLine = $error['line'];
            $hasError = true;
        }

        if (func_num_args()) {
            $errorNumber = func_get_arg(0);
            $errorMessage = func_get_arg(1);
            $errorFile = func_get_arg(2);
            $errorLine = func_get_arg(3);
            $hasError = true;
        }

        if ($hasError) {
            $this->exceptionHandler(new \ErrorException($errorMessage, 0, $errorNumber, $errorFile, $errorLine));
        }

        return true; // Don't execute PHP internal error handler
    }

    /**
     * All exceptions are thrown here and displayed in Json format
     *
     * @param \ErrorException $error
     *
     * @throws Exceptions\ApiException
     */
    public function exceptionHandler(\ErrorException $error)
    {
        $output = new ViewException($error);
        $output->render();
    }

    /**
     * Helper method to group all calls for handling errors and exceptions
     */
    public function setupErrorHandlers()
    {
        set_error_handler(array($this, 'errorHandler'));
        //register_shutdown_function(array($this, 'errorHandler'));
        set_exception_handler(array($this, 'exceptionHandler'));
    }

    /**
     * Filters and list of objects that are executed before Controller functions
     * To add filter classes please refer to ClassPaths::Filters()
     *
     * @param $request
     */
    protected function executeFilters(RequestInterface $request)
    {
        $firstFilter = null;
        $filters = ClassPaths::getFilters($request->className(), $request->methodName());

        foreach ($filters as $index => $filterPath) {
            $filterObject = NewInstance::create($filterPath);
            if (isset($filters[$index - 1])) {
                $previousFilter = $filters[$index - 1];
                $previousFilter->succeedWith($filterObject);
            }
            if ($index == 0) {
                $firstFilter = $filterObject;
            }
            $filters[$index] = $filterObject;
        }

        if ($firstFilter) {
            $firstFilter->check();
        }
    }
}
