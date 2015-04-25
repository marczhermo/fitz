<?php namespace Fitz\Filters\Validations;

use Fitz\Abstracts\FilterAbstract;
use Fitz\Abstracts\SessionInterface;

class HomeFilter extends FilterAbstract
{

    public function __construct()
    {
        //var_dump('constructor of HomeFilter');
        //var_dump($session);
        //var_dump($foo);
        //var_dump($test);
    }

    public function check()
    {
        //var_dump(__CLASS__);

        $this->next();
    }

}