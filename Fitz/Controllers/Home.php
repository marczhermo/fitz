<?php namespace Fitz\Controllers;

use Fitz\Abstracts\BaseController;
use Fitz\Abstracts\SessionInterface;
use Fitz\Databases\PgSQLModel;
use Fitz\Exceptions\Error404Exception;
use Fitz\Exceptions\Error5xxException;
use Fitz\Exceptions\ModelException;
use Fitz\Sessions\Session;

class Home extends BaseController
{

    public function __construct()
    {
        //var_dump('constructor of Home');
        //var_dump($session);
        //var_dump($foo);
        //var_dump($test);
    }

    public function index()
    {
        //$db = new PgSQLModel();
        //$db->test(); // Causes Fatal Error
        //strpos();  // Causes Parse Error
        //throw new ModelException('test exception trigger');
        //throw new Error404Exception('test exception trigger');
        //throw new Error5xxException('test exception trigger');
        //echo 'hello fitz';exit;

        //var_dump(php_sapi_name());
        //var_dump(_ENVIRONMENT);
        //var_dump(USER_IP);
        //var_dump(parse_bool('f'));

        //return $this->view($db->fetchArray("SELECT * FROM \"user\""));
        //return $this->view(array(func_get_args()));
        //return $this->redirect('http://localhost', array(func_get_args()));
        return $this->view((array)'hello fitz');
    }


}