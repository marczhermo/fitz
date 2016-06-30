<?php namespace Fitz\Filters\Permissions;

use Fitz\Abstracts\FilterAbstract;
use Fitz\Abstracts\RequestInterface;

class HomePermission extends FilterAbstract
{

    public function __construct()
    {
        //var_dump('constructor of HomeFilterPermission');
        //var_dump($request);
        //var_dump($foo);
        //var_dump($test);
    }

    public function check()
    {
        //var_dump(__CLASS__);

        $this->next();
    }

}